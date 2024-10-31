FROM php:8.1-fpm

# Instalar dependencias de sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd

# Configurar directorio de trabajo
WORKDIR /var/www/html

# Copiar Composer desde una imagen oficial de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar el proyecto Laravel al contenedor
COPY . .

# Instalar dependencias de Laravel
RUN composer install

# Exponer el puerto
EXPOSE 9000
CMD ["php-fpm"]
