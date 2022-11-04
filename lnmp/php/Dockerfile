FROM php:7.4-fpm
RUN mv  /etc/apt/sources.list  /etc/apt/sources.list.bak
RUN echo "#http://mirrors.163.com/debian/为软件源也可以为其他的 bullseye为版本代号 main non-free contrib区别如下 \
          deb http://mirrors.163.com/debian/ bullseye main non-free contrib \
          deb http://mirrors.163.com/debian/ bullseye-updates main non-free contrib \
          deb http://mirrors.163.com/debian/ bullseye-backports main non-free contrib \
          deb-src http://mirrors.163.com/debian/ bullseye main non-free contrib \
          deb-src http://mirrors.163.com/debian/ bullseye-updates main non-free contrib \
          deb-src http://mirrors.163.com/debian/ bullseye-backports main non-free contrib \
          #deb http://mirrors.163.com/debian-security/ bullseye/updates main non-free contrib \
          #deb http://mirrors.ustc.edu.cn/debian-security/ bullseye/updates main non-free contrib \
          #deb-src http://mirrors.163.com/debian-security/ bullseye/updates main non-free contrib \
          #deb-src http://mirrors.ustc.edu.cn/debian-security/ bullseye/updates main non-free contrib \
          deb http://mirrors.ustc.edu.cn/debian-security/ stable-security main non-free contrib \
          deb-src http://mirrors.ustc.edu.cn/debian-security/ stable-security main non-free contrib" > /etc/apt/sources.list
RUN cat /etc/apt/sources.list
# ADD ./sources.list /etc/apt/
RUN apt-get clean all && apt-get update && apt-get install -y \
libevent-dev pkg-config libxml2 libxml2-dev openssl libssl-dev sqlite3 \
libsqlite3-dev libpng-dev libjpeg-dev libfreetype-dev \
apt-utils \
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