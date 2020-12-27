FROM php:7.3-apache

RUN apt-get update

RUN apt-get install -y \
    curl \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    g++ \
    libzip-dev

RUN a2enmod headers

RUN docker-php-ext-install \
    bz2 \
    intl \
    iconv \
    bcmath \
    opcache \
    calendar \
    mbstring \
    pdo_mysql 

RUN apt-get update -yqq && \
    apt-get install -y apt-utils zip unzip && \
    apt-get install -y libpq-dev && \
    a2enmod rewrite && \
    docker-php-ext-install pdo_pgsql && \
    docker-php-ext-install pgsql && \
    docker-php-ext-configure zip --with-libzip && \
    docker-php-ext-install zip && \
    rm -rf /var/lib/apt/lists/*

ADD ./ /var/www/html
RUN chmod -R 755 /var/www/html/public
RUN chmod -R o+w /var/www/html/storage


RUN chown -R www-data:www-data /var/www/html/public

RUN chgrp -R www-data storage bootstrap/cache
RUN chmod -R ug+rwx storage bootstrap/cache

COPY default.conf /etc/apache2/sites-available/laravel.conf
RUN a2dissite 000-default
RUN a2dissite default-ssl
RUN a2ensite laravel



WORKDIR /var/www/html/public
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

EXPOSE 80
