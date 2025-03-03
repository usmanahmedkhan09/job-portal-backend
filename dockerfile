# Use the official PHP image
FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files
COPY . /var/www/html
WORKDIR /var/www/html

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Expose port 10000
EXPOSE 10000

# Start the application
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]