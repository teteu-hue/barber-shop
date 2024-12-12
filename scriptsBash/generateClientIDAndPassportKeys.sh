#!bin/bash

php artisan passport:key --force
php artisan passport:client --personal
