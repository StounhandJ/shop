FROM composer as composer
COPY composer.* /app/
RUN composer install --ignore-platform-reqs --no-scripts

FROM php:8.1.0alpha3-fpm

COPY composer.lock composer.json /var/www/

WORKDIR /var/www

RUN apt-get update
RUN apt-get install -y zlib1g-dev libpq-dev libmemcached-dev --no-install-recommends \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN pecl install memcached \
    && docker-php-ext-enable memcached

RUN apt-get install -y supervisor
COPY data/scripts/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY --chown=www-data:www-data . /var/www
COPY --from=composer /app/vendor /var/www/vendor
COPY data/scripts/init.sh ./init.sh
RUN sed -i -e 's/\r$//' init.sh
RUN chmod +x ./init.sh

EXPOSE 9000
CMD ["/usr/bin/supervisord"]
