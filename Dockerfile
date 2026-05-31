FROM php:8.3-apache

# Install system dependencies & Node.js untuk build frontend
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    libssl-dev \
    pkg-config \
    libcurl4-openssl-dev \
    nodejs \
    npm

# Install PHP extensions and MongoDB driver
RUN docker-php-ext-install pdo pdo_mysql sockets \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Enable Apache mod_rewrite for Laravel
RUN a2enmod rewrite

# Set Document Root to public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Set working directory
WORKDIR /var/www/html

# Copy all files
COPY . /var/www/html

# Install dependencies PHP
RUN composer install --no-interaction --optimize-autoloader

# Install dependencies Frontend & Build
RUN npm install
RUN npm run build

# Set Permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Start Apache
CMD ["apache2-foreground"]
