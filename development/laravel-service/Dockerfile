FROM  php:8.3-fpm
WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

COPY laravel-service ./

# Устанавливаем зависимости PHP (pdo_pgsql, zip, intl и т.п.)
RUN apt-get update && apt-get install -y libicu-dev zip unzip libzip-dev \
    && docker-php-ext-install pdo_pgsql zip intl

# Устанавливаем Composer (лучше использовать официальный образ composer в multi-stage)
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Запускаем установку зависимостей
RUN composer install --no-interaction --optimize-autoloader
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

CMD ["php-fpm"]

RUN php artisan key:generate
RUN php artisan migrate

EXPOSE 9000