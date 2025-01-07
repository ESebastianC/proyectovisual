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

# Configura la zona horaria
RUN echo "date.timezone = 'America/Guayaquil'" >> /usr/local/etc/php/conf.d/timezone.ini

# Expon el puerto 80 para Apache
EXPOSE 80

# Usar la imagen oficial de MySQL
# En lugar de instalar mysql-server, usaremos un contenedor de MySQL.

# Variables de entorno para la base de datos
ENV MYSQL_ROOT_PASSWORD=root_password
ENV MYSQL_DATABASE=my_database
ENV MYSQL_USER=my_user
ENV MYSQL_PASSWORD=my_password

# Inicia Apache en primer plano
CMD ["apache2-foreground"]
