# Usa una imagen base de PHP con Apache
FROM php:8.2-apache

# Instala las extensiones necesarias para Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia todos los archivos del proyecto en el directorio de trabajo
COPY . .

# Crear los directorios storage y bootstrap/cache si no existen
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache

# Establece los permisos adecuados para el directorio de almacenamiento y caché
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configura el ServerName para evitar advertencias
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Exponer el puerto 80
EXPOSE 80

# El contenedor se ejecutará con Apache en primer plano
CMD ["apache2-foreground"]
