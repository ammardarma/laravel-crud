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

RUN docker-php-ext-install zip 
#RUN docker-php-ext-install mysqli pdo pdo_mysql 
RUN docker-php-ext-install pdo_mysql
#RUN docker-php-ext-install tokenizer 
RUN docker-php-ext-install bcmath 
RUN docker-php-ext-install opcache 
RUN docker-php-ext-install pcntl
RUN docker-php-ext-configure oci8 --with-oci8=instantclient,/usr/lib/oracle/instantclient_19_20
RUN docker-php-ext-install -j$(nproc) oci8 
    # Install the PHP gd library
RUN docker-php-ext-configure gd \
        --with-jpeg=/usr/lib \
        --with-freetype=/usr/include/freetype2 && \
        docker-php-ext-install gd

COPY --chown=www-data:www-data . /var/www

COPY --from=builder /app/vendor /var/www/vendor

USER www-data

EXPOSE 9000
CMD ["php-fpm"]
