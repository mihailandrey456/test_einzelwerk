FROM php:8.3-fpm

RUN apt-get update && apt-get install --no-install-recommends -y \
	libzip-dev zip unzip \
	libpq-dev

RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer