# Stage 1: PHP dependencies via Composer
FROM composer:2 AS vendor

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Stage 2: Build front-end (Vite/Mix)
FROM node:18-alpine AS assets

WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 3: runtime PHP-FPM
FROM php:8.2-fpm-alpine

# 1) Instala libs de sistema e extensões PHP requisitadas por Laravel 12
RUN apk add --no-cache \
        bash \
        git \
        curl \
        oniguruma-dev \           # mbstring
        libzip-dev \
        libpng-dev \
        libjpeg-turbo-dev \
        freetype-dev \
        libxml2-dev \            # xml
        zip \
        unzip \
    && docker-php-ext-configure gd \
         --with-freetype=/usr/include/ \
         --with-jpeg=/usr/include/ \
    && docker-php-ext-install \
         pdo \
         pdo_mysql \             # ou pdo_pgsql, conforme seu BD
         pdo_pgsql \
         mbstring \
         xml \                   # XML / SimpleXML / XMLReader / XMLWriter
         gd \
         zip \
         bcmath \
         opcache \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apk del \
         oniguruma-dev \
         libjpeg-turbo-dev \
         freetype-dev \
         libxml2-dev

# 2) Copia Composer
COPY --from=vendor /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# 3) Copia vendor e código
COPY --from=vendor /app/vendor ./vendor
COPY . .

# 4) Copia assets compilados
COPY --from=assets /app/public/js  ./public/js
COPY --from=assets /app/public/css ./public/css

# 5) Otimizações Laravel em build-time
RUN php artisan key:generate \
 && php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache

# 6) Permissões
RUN chown -R www-data:www-data /var/www/html \
 && chmod -R 775 storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
