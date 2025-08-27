FROM php:8.3-fpm

# Update Packages OS-level
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libxpm-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    bash \
    fcgiwrap \
    libmcrypt-dev \
    libonig-dev \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP-isms
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath opcache

# Install Composer
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

# Copy abstracted files (compose, compose's .env et al) to where application files are
COPY . /var/www/html/

# Set ownership/permissions for /var/www/html/ over to a different user (www-data)
RUN chown -R www-data:www-data /var/www/html/

#change to said user, expose webport and run php
USER www-data
EXPOSE 9000
CMD ["php-fpm"]