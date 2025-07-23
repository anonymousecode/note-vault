# Use an official PHP runtime as a parent image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && \
    apt-get install -y \
        git \
        unzip \
        libzip-dev \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        libcurl4-openssl-dev \
        pkg-config \
        libssl-dev \
        && docker-php-ext-install zip pdo pdo_mysql

# If you need MongoDB support (add the extension)
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy the application code to the container
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Optionally install Node (for frontend builds)
# RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
# RUN apt-get install -y nodejs && npm install && npm run build

# Permissions (not always needed, depends on your Docker setup)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port 8000 and default to php artisan serve
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
