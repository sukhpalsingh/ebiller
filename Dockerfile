FROM php:7.1-apache
COPY ./ /var/www/html/

RUN apt-get install curl git unzip gnupg libpng-dev
RUN docker-php-ext-install mbstring

RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

RUN curl -sL https://deb.nodesource.com/setup_4.x | -E bash -
RUN apt-get install -y nodejs

EXPOSE 80
CMD ["apache2-foreground"]
