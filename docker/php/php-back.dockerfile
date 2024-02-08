FROM php:8.1.4-fpm-alpine

#RUN echo http://dl-cdn.alpinelinux.org/alpine/edge/main >> /etc/apk/repositories
#RUN echo http://dl-cdn.alpinelinux.org/alpine/edge/community/ >> /etc/apk/repositories

ADD ./docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf
ADD ./docker/credentials/composer_auth.json /root/.composer/auth.json
RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN mkdir -p /var/www/html

RUN chown laravel:laravel /var/www/html

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

RUN apk add --update bash zip unzip curl sqlite supervisor php8 \
    git \
    php8-common \
    php8-fpm \
    php8-pdo \
    php8-opcache \
    php8-zip \
    php8-phar \
    php8-iconv \
    php8-cli \
    php8-curl \
    php8-openssl \
    php8-mbstring \
    php8-tokenizer \
    php8-fileinfo \
    php8-json \
    php8-xml \
    php8-xmlwriter \
    php8-simplexml \
    php8-dom \
    php8-pdo_mysql \
    php8-pdo_sqlite \
    php8-tokenizer \
    php8-pecl-redis \
    php8-xdebug

#RUN echo "ipv6" >> /etc/modules
#RUN apk add --update \
#		$PHPIZE_DEPS \
##		freetype-dev \
##		git \
#		libjpeg-turbo-dev \
#		libpng-dev \
#		libxml2-dev \
#		libzip-dev \
##		openssh-client \
#		php8.1-json \
##		php8-openssl \
##		php8-pdo \
##		php8-pdo_mysql \
##		php8-session \
#		php8-simplexml \
##		php8-tokenizer \
#		php8-xml \
##		imagemagick \
##		imagemagick-libs \
##		imagemagick-dev \
##		php8-imagick \
##		php8-pcntl \
#		php8-zip \
##		sqlite \
##	&& docker-php-ext-install iconv soap sockets exif bcmath pdo_mysql pcntl \
##	&& docker-php-ext-configure gd --with-jpeg --with-freetype \
#	&& docker-php-ext-install gd \
#	&& docker-php-ext-install zip
#
#RUN printf "\n" | pecl install \
#    		imagick && \
#    		docker-php-ext-enable --ini-name 20-imagick.ini imagick
#
#RUN printf "\n" | pecl install \
#    		pcov && \
#    		docker-php-ext-enable pcov
#
# Installing composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm -rf composer-setup.php
#
## Install
#RUN apk update
#RUN apk add tesseract-ocr
#RUN apk add tesseract-ocr-dev
#RUN apk add g++ # or clang++ (presumably)
#RUN apk add autoconf automake libtool
RUN apk add curl git pkgconfig && curl https://glide.sh/get | sh
#RUN apk add libpng-dev
#RUN apk add --upgrade libjpeg
