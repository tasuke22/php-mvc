FROM php:8.1.18-fpm

COPY ./php.ini /usr/local/etc/php/

RUN apt-get update && apt-get install -y \
	git \
	curl \
	zip \
	unzip \
    && docker-php-ext-install pdo_mysql

RUN pecl install xdebug && docker-php-ext-enable xdebug


WORKDIR /var/www/html