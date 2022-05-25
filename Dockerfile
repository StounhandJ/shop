FROM composer as composer
COPY composer.* /app/
RUN composer install --ignore-platform-reqs --no-scripts

FROM php:8.1-fpm

COPY composer.lock composer.json /var/www/

WORKDIR /var/www

RUN apt-get update --fix-missing
RUN apt-get install -y zlib1g-dev libpq-dev libmemcached-dev --no-install-recommends \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# memcached
RUN pecl install memcached \
    && docker-php-ext-enable memcached
# ------

# Supervisor
RUN apt-get install -y supervisor
COPY data/scripts/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
# ------

# Kafka
RUN apt-get install -y curl wget zip unzip git python \
    && rm -rf /var/lib/apt/lists/*

RUN git clone --depth 1 --branch v1.9.0-RC10 https://github.com/edenhill/librdkafka.git \
    && ( \
        cd librdkafka \
        && ./configure \
        && make \
        && make install \
    ) \
    && pecl install rdkafka \
    && echo "extension=rdkafka.so" > /usr/local/etc/php/conf.d/rdkafka.ini
# ------

COPY --chown=www-data:www-data . /var/www
COPY --from=composer /app/vendor /var/www/vendor
COPY data/scripts/init.sh ./init.sh
RUN sed -i -e 's/\r$//' init.sh
RUN chmod +x ./init.sh

EXPOSE 9000
CMD ["/usr/bin/supervisord"]
