FROM php:8.2-cli

# Install system dependencies and PHP extensions for SQLite and MySQL
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_sqlite pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Set permissions for Laravel storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Create SQLite database file and run migration & seeding
RUN touch database/database.sqlite && chown www-data:www-data database/database.sqlite
RUN DB_CONNECTION=sqlite DB_DATABASE=database/database.sqlite php artisan migrate --force --seed

# Expose default port
EXPOSE 80

# Start PHP built-in web server on the dynamic $PORT provided by Railway
CMD php -S 0.0.0.0:$PORT -t public
