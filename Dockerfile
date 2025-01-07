# Usa una imagen oficial de PHP con Apache y PHP 8.1
FROM php:8.1-apache

# Instalamos las dependencias necesarias para PHP, Apache, y MySQL
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    curl \
    libmysqlclient-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip mysqli pdo pdo_mysql \
    && apt-get clean

# Habilita los módulos necesarios de Apache
RUN a2enmod rewrite

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos de tu aplicación dentro del contenedor
COPY . /var/www/html/

# Cambia los permisos de los archivos
RUN chown -R www-data:www-data /var/www/html

# Instala y configura MySQL
RUN apt-get update && apt-get install -y mysql-server

# Configura MySQL (opcionalmente, puedes personalizarlo según tus necesidades)
RUN service mysql start && \
    mysql -e "CREATE DATABASE my_database;" && \
    mysql -e "CREATE USER 'my_user'@'localhost' IDENTIFIED BY 'my_password';" && \
    mysql -e "GRANT ALL PRIVILEGES ON my_database.* TO 'my_user'@'localhost';" && \
    mysql -e "FLUSH PRIVILEGES;"

# Instala phpMyAdmin
RUN curl -LO https://files.phpmyadmin.net/phpMyAdmin/latest-english.tar.gz && \
    tar -xvzf latest-english.tar.gz && \
    mv phpMyAdmin-* /var/www/html/phpmyadmin && \
    rm -rf latest-english.tar.gz

# Configura phpMyAdmin
COPY ./config.inc.php /var/www/html/phpmyadmin/config.inc.php

# Expon el puerto 80 para Apache y 3306 para MySQL
EXPOSE 80
EXPOSE 3306

# Configura la zona horaria
RUN echo "date.timezone = 'America/Guayaquil'" >> /usr/local/etc/php/conf.d/timezone.ini

# Inicia Apache y MySQL en el contenedor
CMD service mysql start && apache2-foreground
