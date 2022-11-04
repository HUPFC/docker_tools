FROM php:7.4-fpm

#RUN apt-get clean all && apt-get update
#&& apt-get install -y \
#     libfreetype6-dev  libjpeg62-turbo-dev libpng-dev \
#     && docker-php-ext-configure gd  && docker-php-ext-install -j$(nproc) gd \
#&& apt-get install -y \
#     libzip-dev zlib1g-dev \
#     && docker-php-ext-install zip \
#     && docker-php-ext-install pdo pdo_mysql mysqli \
#     && docker-php-ext-install -j$(nproc) iconv \

RUN pecl install redis && docker-php-ext-enable redis \
&& docker-php-ext-install sockets && docker-php-ext-enable sockets \
&& pecl install event-3.0.6 && docker-php-ext-enable event \
&&  rm -rf /tmp/pear \

RUN curl -sS https://getcomposer.org/installer | php -- \
--install-dir=/usr/bin --filename=composer
RUN  chmod a+x /usr/bin/composer \
    && composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/