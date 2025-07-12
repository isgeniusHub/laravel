FROM  php:8.3-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip intl

COPY native-service ./

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

#COPY ./conf.d/php.ini /usr/local/etc/php/conf.d/php.ini
COPY development/native-service/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Устанавливаем Composer (лучше использовать официальный образ composer в multi-stage)
#COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Запускаем установку зависимостей
#RUN composer install --no-interaction --optimize-autoloader
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 777 /var/www/html

CMD ["php-fpm"]
EXPOSE 9000