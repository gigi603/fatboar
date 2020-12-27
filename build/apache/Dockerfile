FROM php:7.3.6-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/src

RUN apt update
RUN apt install -y \
    curl \
    nano

RUN docker-php-ext-install pdo \
    && docker-php-ext-install opcache

COPY $PWD/build/apache/apache.conf ./etc/apache2/sites-available/docker.conf
RUN a2dissite 000-default default-ssl
RUN a2ensite docker

COPY $PWD /var/www
WORKDIR /var/www
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

EXPOSE 80