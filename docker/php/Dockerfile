FROM php:8.3-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev default-mysql-client \
    && docker-php-ext-install pdo_mysql zip \
    && pecl install redis && docker-php-ext-enable redis \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN useradd -u 1000 -m application

COPY docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

RUN chown -R 1000:1000 /var/www

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]