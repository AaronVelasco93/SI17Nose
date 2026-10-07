# • Distribución: Debian 12 (Bookworm) (es la versión estable de Debian utilizada para las imágenes de PHP 8.2 recientes).
# • Arquitectura típica: amd64 (para la mayoría de servidores y PCs Intel/AMD) o arm64 (para entornos como Apple Silicon / Raspberry Pi).
FROM php:8.2-apache

# habilitar la extensión de PDO con MySQL

RUN docker-php-ext-install pdo_mysql 

# Replazar la configuracion del sitios por defecto para que apunte a la carpeta /public
COPY docker/app/000-default.conf /etc/apache2/sites-available/000-default.conf