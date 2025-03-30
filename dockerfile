# Use the official PHP image
FROM php:8.2-apache  # Switch to Apache for better Laravel compatibility

# Install system dependencies + MySQL driver
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files
COPY . /var/www/html
WORKDIR /var/www/html

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Set up Apache
COPY .docker/apache.conf /etc/apache2/sites-available/000-default.conf
RUN chown -R www-data:www-data /var/www/html/storage \
    && a2enmod rewrite

# Expose port 10000
EXPOSE 10000

# Start the application
CMD ["apache2-foreground"]