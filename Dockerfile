FROM php:8-fpm

RUN pecl install xdebug-3.2.1 \
    && docker-php-ext-enable xdebug

# Update system core
RUN apt update -y && apt upgrade -y
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
