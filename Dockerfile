FROM 8.0.28-alpine

ENV NGINX_VERSION 1.20.2
ENV NJS_VERSION   0.7.0
ENV PKG_RELEASE   1

RUN apk update && apk add --no-cache \
    zip \
    unzip \
    dos2unix \
    supervisor \
    libpng-dev \
    libzip-dev \
    freetype-dev \
    $PHPIZE_DEPS \
    libjpeg-turbo-dev
    
# compile native PHP packages
RUN docker-php-ext-install \
    gd \
    pcntl \
    bcmath \
    mysqli \
    pdo_mysql

EXPOSE 80
