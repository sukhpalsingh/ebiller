FROM php:7.1-apache
COPY ./ /var/www/html/

RUN apt-get update -qq
RUN apt-get install -qq curl git unzip libpng-dev
RUN apt-get install -qq gnupg libpng-dev

RUN curl -sL https://deb.nodesource.com/setup_11.x | bash -

RUN apt-get install nodejs

RUN apt-get install -qq nginx nodejs

RUN docker-php-ext-install mbstring pdo_mysql

# Composer Install
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

RUN ln -s /var/www/html/storage/app/public /var/www/html/public/storage

EXPOSE 80
CMD ["apache2-foreground"]
