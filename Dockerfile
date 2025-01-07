# Usar una imagen oficial de PHP con Apache
FROM php:8.0-apache

# Instalar extensiones necesarias, incluyendo mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copiar archivos del proyecto al contenedor
COPY . /var/www/html/

# Establecer el puerto de exposición
EXPOSE 80

# Iniciar el servidor Apache
CMD ["apache2-foreground"]
