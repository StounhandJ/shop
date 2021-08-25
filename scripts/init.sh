#!/bin/bash

sleep 5
php artisan migrate
php artisan storage:link

php-fpm
