#!/usr/bin/env sh

# Clear Laravel caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Run migrations
php artisan migrate --force

# Run seeders
php artisan db:seed --force

# Start Laravel server
php artisan serve --host 0.0.0.0 --port $PORT
