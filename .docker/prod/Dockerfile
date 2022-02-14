FROM php:7.4-apache

RUN apt update \
    && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer self-update --1

RUN a2enmod rewrite && service apache2 restart

COPY . /var/www

WORKDIR /var/www

RUN composer install --no-dev --no-scripts --optimize-autoloader && APP_ENV=prod APP_DEBUG=0 php bin/console cache:clear