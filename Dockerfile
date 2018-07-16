FROM php:7.1-apache
COPY ./ /var/www/html/

RUN apt-get install curl git unzip
RUN docker-php-ext-install mbstring

RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

EXPOSE 80
CMD ["apache2-foreground"]
