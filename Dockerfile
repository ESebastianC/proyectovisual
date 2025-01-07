
FROM php:8.1-apache


RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip mysqli pdo pdo_mysql \
    && apt-get clean

RUN a2enmod rewrite


WORKDIR /var/www/html


COPY . /var/www/html/


RUN chown -R www-data:www-data /var/www/html


RUN echo "date.timezone = 'America/Guayaquil'" >> /usr/local/etc/php/conf.d/timezone.ini


EXPOSE 80




ENV MYSQL_ROOT_PASSWORD=root_password
ENV MYSQL_DATABASE=my_database
ENV MYSQL_USER=my_user
ENV MYSQL_PASSWORD=my_password


CMD ["apache2-foreground"]
