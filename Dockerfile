FROM php:7.4-apache
LABEL MAINTAINER = Anderson Amaral - Projeto Dio Cloud Devops Experience
#Install git and MySQL extensions for PHP

RUN apt-get update && apt upgrade -y
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite

ENV APACHE_LOCK_DIR='/var/lock'
ENV APACHE_PID_FILE='/var/run/apache2.pid'
ENV APACHE_RUN_USER='www-data'
ENV APACHE_RUN_GROUP='www-data'
ENV APACHE_LOG_DIR='/var/log/apache2'

RUN rm -fr /var/www/html/*.html
COPY ./php /var/www/html
VOLUME /var/www/html

EXPOSE 80/tcp
EXPOSE 443/tcp