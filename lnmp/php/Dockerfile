FROM php:7.4.33-fpm
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN mv  /etc/apt/sources.list  /etc/apt/sources.list.bak
ADD sources.list /etc/apt/
RUN cat /etc/apt/sources.list
RUN apt-get clean all && apt-get update && apt-get install -y \
libevent-dev pkg-config libxml2 libxml2-dev openssl libssl-dev sqlite3 \
libsqlite3-dev libpng-dev libjpeg-dev libfreetype-dev \
 && docker-php-ext-install pdo_mysql mysqli \
 && docker-php-ext-install bcmath exif gd iconv pcntl

RUN pecl install redis && docker-php-ext-enable redis \
&& docker-php-ext-install sockets && docker-php-ext-enable sockets \
&& pecl install event-3.0.6 && docker-php-ext-enable event \
&&  rm -rf /tmp/pear

RUN curl -sS https://getcomposer.org/installer | php -- \
--install-dir=/usr/bin --filename=composer
RUN  chmod a+x /usr/bin/composer \
    && composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
EXPOSE 9000
