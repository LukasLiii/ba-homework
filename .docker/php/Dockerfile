FROM php:8-fpm

RUN apt-get update && apt-get install -y && apt-get install -y git \
        libmcrypt-dev \
        libpq-dev \
    && pecl install mcrypt \
    && docker-php-ext-enable mcrypt \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli

# composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# node
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash
RUN apt-get install nodejs -y

WORKDIR /var/www

RUN chown -R www-data:www-data /var/www
