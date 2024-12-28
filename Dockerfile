# Use the official PHP image as a base
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    && apt-get clean

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Redis extension (optional)
RUN pecl install redis \
    && docker-php-ext-enable redis

# Install Composer (dependency manager for PHP)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy the existing application directory contents into the container
COPY . /var/www

# Set proper ownership and permissions for the storage folder and bootstrap cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expose port 9000 (PHP-FPM uses this port to communicate with Nginx)
EXPOSE 9000

# Start the PHP-FPM server
CMD ["php-fpm"]
