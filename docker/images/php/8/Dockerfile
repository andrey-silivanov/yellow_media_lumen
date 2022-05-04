FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
        curl \
        libpq-dev\
        libpng-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        wget \
        git \
        wget git unzip;

RUN docker-php-ext-install pdo pdo_pgsql
RUN apt-get -yqq install exiftool
RUN docker-php-ext-configure exif
RUN docker-php-ext-install exif
RUN docker-php-ext-enable exif
RUN docker-php-ext-install gd
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD ./php.ini /usr/local/etc/php/php.ini

WORKDIR /code

ENV user andrey

RUN useradd -m -d /home/${user} ${user} \
 && chown -R ${user} /home/${user}

USER ${user}

CMD ["php-fpm"]
