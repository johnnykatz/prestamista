FROM php:7.4-fpm

ADD ./docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf
ADD ./docker/credentials/composer_auth.json /root/.composer/auth.json
#RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/bash -D laravel

RUN mkdir -p /var/www/html

RUN  adduser laravel
RUN  usermod -a -G laravel laravel

#RUN chown laravel:laravel /var/www/html

WORKDIR /var/www/html

RUN set -eux; \
    apt-get update; \
    apt-get upgrade -y; \
    apt-get install -y --no-install-recommends \
            vim \
            curl \
            zip \
            libmemcached-dev \
            libz-dev \
            libpq-dev \
            libjpeg-dev \
            libpng-dev \
            libfreetype6-dev \
            libssl-dev \
            libwebp-dev \
            libxpm-dev \
            libmcrypt-dev \
            libzip-dev \
            openssh-server \
            libmagickwand-dev \
            git \
            cron \
            libxml2-dev \
            libreadline-dev \
            libgmp-dev \
            unzip\
            libonig-dev; \

    rm -rf /var/lib/apt/lists/*

# Install mailparse extension
RUN pecl install mailparse
RUN docker-php-ext-enable mailparse

# Install soap extention
RUN docker-php-ext-install soap

# Install for image manipulation
RUN docker-php-ext-install exif

# Install the PHP pcntl extention
RUN docker-php-ext-install pcntl

# Install the PHP zip extention
RUN docker-php-ext-install zip

# Install the PHP pdo_mysql extention
RUN docker-php-ext-install pdo_mysql

# Install the PHP bcmath extension
RUN docker-php-ext-install bcmath

# Install the PHP intl extention
RUN docker-php-ext-install intl

# Install the PHP gmp extention
RUN docker-php-ext-install gmp

RUN pecl install imagick && \
    docker-php-ext-enable imagick

# Install the PHP gd library
RUN docker-php-ext-install gd && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# Install the php memcached extension
RUN pecl install memcached && docker-php-ext-enable memcached


# Installing composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm -rf composer-setup.php


#Cron   se debe corregir que se ejecute para el user laravel en el contenedor
#RUN touch /var/www/cron.log
#COPY ./docker/php/cron.txt /etc/cron.d/crontab
#RUN chmod 0644 /etc/cron.d/crontab
#RUN /bin/sh -c crontab /etc/cron.d/crontab



#
## Install
#RUN apk update
#RUN apk add tesseract-ocr
#RUN apk add tesseract-ocr-dev
#RUN apk add g++ # or clang++ (presumably)
#RUN apk add autoconf automake libtool
#RUN apk add curl git pkgconfig && curl https://glide.sh/get | sh
#RUN apk add libpng-dev
#RUN apk add --upgrade libjpeg



