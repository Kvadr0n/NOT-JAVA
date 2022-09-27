FROM php:7.4.18-apache
RUN docker-php-ext-install mysqli
COPY ports.conf /etc/apache2/
COPY 000-default.conf /etc/apache2/sites-available/