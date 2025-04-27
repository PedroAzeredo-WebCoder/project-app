#############################
# Stage 1: Dependências PHP
#############################
FROM composer:2 AS vendor

WORKDIR /app

# 1) Copia só composer.json e composer.lock para otimizar cache
COPY composer.json composer.lock ./

# 2) Instala as deps sem dev, otimiza autoload e desativa scripts
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-scripts

#############################
# Stage 2: Build de assets
#############################
FROM node:20-alpine AS assets

WORKDIR /app

# 1) Copia package.json e package-lock.json para cache de dependências
COPY package.json package-lock.json ./
RUN npm ci

# 2) Copia o resto do código e gera o build
COPY . .
RUN npm run build

#############################
# Stage 3: PHP-FPM runtime
#############################
FROM php:8.2-fpm-alpine

# 1) Instala bibliotecas de runtime e agrupa os build-deps
RUN apk add --no-cache \
        bash \
        git \
        curl \
        zip \
        unzip \
        freetype \
        libpng \
        libjpeg-turbo \
        libxml2 \
        libzip \
        postgresql-libs && \
    apk add --no-cache --virtual .build-deps \
        autoconf \
        g++ \
        make \
        linux-headers \
        oniguruma-dev \
        freetype-dev \
        libpng-dev \
        libjpeg-turbo-dev \
        libxml2-dev \
        libzip-dev \
        postgresql-dev \
        pkgconfig && \
# 2) Configura e instala extensões PHP
    docker-php-ext-configure gd \
        --with-freetype=/usr/include/ \
        --with-jpeg=/usr/include/ && \
    docker-php-ext-install \
        pdo_mysql \
        pdo_pgsql \
        mbstring \
        xml \
        gd \
        zip \
        bcmath \
        opcache && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug && \
# 3) Remove só os build deps, mantendo as runtime libs
    apk del .build-deps

# 4) Copia o Composer do stage vendor
COPY --from=vendor /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# 5) Copia vendor gerado no stage 1
COPY --from=vendor /app/vendor ./vendor

# 6) Copia o restante do código (inclui artisan, config, etc)
COPY . .

# 7) Copia o build de assets gerado no stage 2
COPY --from=assets /app/public/build ./public/build

# 8) Otimizações Angular em build-time
RUN composer dump-autoload --optimize && \
    php artisan package:discover --ansi && \
    php artisan key:generate && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# 9) Ajusta permissões para www-data
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    chmod -R 775 storage bootstrap/cache

# 10) Expondo porta e comando padrão
EXPOSE 9000
CMD ["php-fpm"]
