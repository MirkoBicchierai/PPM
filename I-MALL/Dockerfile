FROM php:7.3-apache

#Install git and MySQL extensions for PHP

RUN apt-get update && apt-get install -y git
RUN a2enmod rewrite

COPY src /var/www/html/
EXPOSE 80/tcp
EXPOSE 443/tcp