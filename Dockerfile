# Use the official PHP image
FROM php:8.2-fpm

# Install required system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    libpng-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd exif  # Added exif extension

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the existing Laravel project to the container
COPY . .

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Laravel dependencies, optimizing for production
RUN composer install --no-dev --optimize-autoloader

# Set appropriate permissions for the storage and cache directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
RUN php artisan storage:link
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/public
RUN chmod -R 775 /var/www/html/storage /var/www/html/public

# Expose the port for PHP-FPM
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
