# Use the official PHP image
FROM php:8.1-cli

# Set the working directory in the container
WORKDIR /usr/src/app/BE

# Copy the Composer files and install dependencies
COPY composer.json composer.lock ./
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Install dependencies
RUN composer install --no-scripts --no-autoloader

# Copy the rest of the application code
COPY . .

# Run Composer scripts and optimize autoloader
RUN composer dump-autoload --optimize --no-scripts

# Expose port 8000 to the outside world
EXPOSE 8000

# Start the PHP built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
