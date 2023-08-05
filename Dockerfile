FROM composer as builder
WORKDIR /app/
COPY . ./
RUN composer install

FROM php:8.1-fpm

WORKDIR /var/www/

RUN apt-get update && apt-get install -y \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        libpq-dev \
        zip \
        curl \
        unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN  docker-php-ext-configure gd \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-ext-install exif \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pgsql \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-source delete

COPY --chown=www-data:www-data . /var/www

COPY --from=builder /app/vendor /var/www/vendor

USER www-data

EXPOSE 9000
CMD ["php-fpm"]