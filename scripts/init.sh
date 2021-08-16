#!/bin/bash

sleep 5
php artisan migrate
php -S 0.0.0.0:8080 -t public
