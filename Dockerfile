FROM php:8.2-apache
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libonig-dev libxml2-dev zip unzip git curl     && docker-php-ext-install pdo pdo_mysql
RUN pecl install mongodb && docker-php-ext-enable mongodb
COPY . /var/www/html/
EXPOSE 80