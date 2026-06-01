#!/bin/bash
set -e

# Matikan modul yang bentrok
a2dismod mpm_event mpm_worker mpm_prefork || true
a2enmod mpm_prefork

# Set port Apache sesuai PORT yang diberikan Railway (default 80)
PORT="${PORT:-80}"

# Tulis ulang ports.conf secara langsung (lebih reliable daripada sed replace)
echo "Listen ${PORT}" > /etc/apache2/ports.conf

# Tulis ulang VirtualHost config
cat > /etc/apache2/sites-available/000-default.conf <<EOF
<VirtualHost *:${PORT}>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html/public

    <Directory /var/www/html/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF

# Pastikan storage directories ada dan writable
mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/html/storage/framework/{sessions,views,cache}
mkdir -p /var/www/html/bootstrap/cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Unset Railway's injected DB variables to prevent them from confusing Laravel's DB config parser
unset DATABASE_URL
unset DB_CONNECTION
unset MONGO_URL

# Override .env to force debug mode and errorlog so we can see what's wrong
sed -i 's/APP_DEBUG=.*/APP_DEBUG=true/g' /var/www/html/.env
sed -i 's/LOG_CHANNEL=.*/LOG_CHANNEL=errorlog/g' /var/www/html/.env

# Debug PHP
echo "DEBUG PHP MODULES:"
php -m | grep -i mongo || echo "MongoDB extension NOT loaded!"
php -i | grep display_errors
php -i | grep log_errors

# FORCE display_errors to see fatal errors in browser!
echo "display_errors = On" > /usr/local/etc/php/conf.d/docker-php-ext-display-errors.ini
echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-display-errors.ini
echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-display-errors.ini

# Laravel: clear cache & optimize
cd /var/www/html
php artisan config:clear || true
php artisan cache:clear || true
php artisan view:clear || true
php artisan storage:link || true

exec apache2-foreground

