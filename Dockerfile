# Multi-stage build: build frontend with Node, then install PHP and Composer

# Stage 1: build frontend
FROM node:18-alpine AS node_builder
WORKDIR /app/laravel
COPY laravel/package.json laravel/package-lock.json ./
RUN npm ci --silent || true
COPY laravel ./
RUN npm run build --prefix ./ || true

# Stage 2: PHP runtime
FROM php:8.2-cli
WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    zlib1g-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd mbstring || true \
    && rm -rf /var/lib/apt/lists/*

# Install composer (copy from official composer image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy application code
COPY . /var/www/html

# Copy built frontend assets from node stage (if produced)
COPY --from=node_builder /app/laravel/public /var/www/html/public

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction || true

# Ensure storage and bootstrap cache folders exist
RUN php -r "file_exists('bootstrap/cache') || mkdir('bootstrap/cache', 0755, true);" || true
RUN php -r "file_exists('storage') || mkdir('storage', 0755, true);" || true
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache || true

EXPOSE 3000

# Start built-in PHP server for Render (use port 3000)
CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "3000"]
