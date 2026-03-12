#!/bin/bash
set -e

cd /var/www

if [ ! -f .env ]; then
    cp .env.example .env
fi

if [ ! -d "vendor" ]; then
    echo "Installing composer dependencies..."
    composer install --no-interaction --prefer-dist
fi

php artisan key:generate --force

echo "Waiting for database..."
until mysqladmin ping -h"mysql" -u"root" -p"root" --silent; do
    sleep 2
done

php artisan migrate --force

echo "Starting PHP-FPM..."
exec php-fpm