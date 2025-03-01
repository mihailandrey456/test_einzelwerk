FROM php:8.3-fpm

RUN apt-get update && apt-get install --no-install-recommends -y \
	libzip-dev zip unzip

RUN docker-php-ext-install pdo_mysql mysqli
RUN docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer