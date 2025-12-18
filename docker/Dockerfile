FROM php:8.3-fpm

RUN apt-get update \
    && apt-get install -y \
    libpq-dev \
    libcurl4-openssl-dev \
    unzip \
    git \
    libzip-dev \
    && docker-php-ext-install \
    pcntl \
    pdo \
    pdo_pgsql \
    pgsql

RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin \
    --filename=composer

RUN printf "no\nyes\nno\nyes\n" | pecl install swoole \
    && echo "swoole.use_shortname = Off" >> /usr/local/etc/php/conf.d/swoole.ini \
    && docker-php-ext-enable swoole