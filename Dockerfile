FROM php:8.1-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get upgrade -y \
    git \
    curl \
    zip \
    unzip \
    vim \
    libzip-dev \
    libpng-dev

RUN docker-php-ext-install zip gd

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
