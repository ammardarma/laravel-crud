# Composer Install 
FROM composer as builder
WORKDIR /app/
COPY . ./
RUN composer install --ignore-platform-req=ext-oci8

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
        unzip \
	nginx \
	vim \
	php8.2-common/stable php8.2-xml/stable php8.2-opcache/stable php8.2-readline/stable \
	php8.2-dev/stable php-cli/stable php-common/stable php-xml/stable \
	php-dev/stable php-pear/stable build-essential libaio1 \
	libjpeg-dev/stable libfreetype6-dev

RUN curl -o instantclient-basic-193000.zip  https://download.oracle.com/otn_software/linux/instantclient/1920000/instantclient-basic-linux.x64-19.20.0.0.0dbru.zip\
    && unzip instantclient-basic-193000.zip -d /usr/lib/oracle/ \
    && rm instantclient-basic-193000.zip \
    && curl -o instantclient-basic-193000.zip  https://download.oracle.com/otn_software/linux/instantclient/1920000/instantclient-sdk-linux.x64-19.20.0.0.0dbru.zip\
    && unzip instantclient-basic-193000.zip -d /usr/lib/oracle/ \
    && rm instantclient-basic-193000.zip \
    && echo /usr/lib/oracle/instantclient_19_20 > /etc/ld.so.conf.d/oracle-instantclient.conf \
    && ldconfig

ENV LD_LIBRARY_PATH /usr/lib/oracle/instantclient_19_20

RUN docker-php-ext-install zip \
	&& docker-php-ext-install pdo_mysql \
	&& docker-php-ext-install bcmath \
	&& docker-php-ext-install opcache \
	&& docker-php-ext-install pcntl \
	&& docker-php-ext-configure oci8 --with-oci8=instantclient,/usr/lib/oracle/instantclient_19_20 \
	&& docker-php-ext-install -j$(nproc) oci8 \
    	# Install the PHP gd library
	&& docker-php-ext-configure gd \
        --with-jpeg=/usr/lib \
        --with-freetype=/usr/include/freetype2 \
        && docker-php-ext-install gd

COPY --chown=www-data:www-data . /var/www
COPY --from=builder /app/vendor ./vendor

RUN mkdir /run/php && \
    mkdir /run/nginx && \
    chown -R www-data:www-data /run/php && \
    chown -R www-data:www-data /run/nginx && \
    chown -R www-data:www-data /var/lib/nginx

COPY ./default /etc/nginx/sites-enabled/default
COPY ./zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf
COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./docker-php-entrypoint /usr/local/bin/docker-php-entrypoint

RUN cp .env.example .env && php artisan key:generate

USER www-data

EXPOSE 80
CMD ["php-fpm"]
