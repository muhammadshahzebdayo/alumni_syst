FROM php:8.2-apache

# Database connections ke liye zaroori tools install karein
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    libpq-dev \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql

# Apache configuration
RUN a2enmod rewrite
COPY . /var/www/html
WORKDIR /var/www/html

# Composer install karein
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Permissions set karein taake Laravel errors na de
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80
