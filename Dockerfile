FROM php:8-fpm

RUN pecl install xdebug-3.2.1 \
    && docker-php-ext-enable xdebug
