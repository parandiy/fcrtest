FROM php:8.3-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip

RUN pecl install redis && docker-php-ext-enable redis

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

#CMD bash -c "
#composer install &&
#php artisan key:generate &&
#php artisan migrate --force &&
#php-fpm
#"

RUN mkdir -p storage/framework/cache \
    storage/framework/views \
    storage/framework/sessions \
    bootstrap/cache \
 && chmod -R 777 storage bootstrap/cache


RUN useradd -m -u 1000 application

WORKDIR /var/www

RUN chown -R application:application /var/www

USER application
