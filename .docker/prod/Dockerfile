FROM php:7.4-apache

RUN useradd jeromefarin

RUN groupmod -g 1000 jeromefarin \
  && usermod -u 1000 -g 1000 jeromefarin

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

RUN chown -R jeromefarin:jeromefarin /var/www

USER jeromefarin

WORKDIR /var/www

RUN composer install --no-dev --optimize-autoloader