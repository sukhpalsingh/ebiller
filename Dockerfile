FROM php:7.1-apache
COPY ./ /var/www/html/

RUN apt-get update -qq
RUN apt-get install -qq curl git unzip libpng-dev
RUN apt-get install -qq gnupg libpng-dev

RUN echo "deb http://deb.nodesource.com/node_7.x stretch main" > /etc/apt/sources.list.d/nodesource.list && \
    curl -s https://deb.nodesource.com/gpgkey/nodesource.gpg.key | apt-key add -

RUN apt-get install -qq nginx nodejs

RUN docker-php-ext-install mbstring pdo_mysql

# Composer Install
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

EXPOSE 80
CMD ["apache2-foreground"]
