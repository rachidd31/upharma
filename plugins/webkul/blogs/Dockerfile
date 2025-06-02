# syntax=docker/dockerfile:1

# --- Stage 1: Build assets ---
FROM node:20-alpine AS assets-builder
WORKDIR /app

# Install dependencies and build assets
COPY --link package.json postcss.config.js tailwind.config.js ./
COPY --link resources/ ./resources/
RUN npm install --no-audit --no-fund && npm run build

# --- Stage 2: PHP dependencies ---
FROM composer:2.7 AS composer-deps
WORKDIR /app
COPY --link composer.json ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-scripts

# --- Stage 3: Final runtime image ---
FROM php:8.2-fpm-alpine AS final

# Install system dependencies
RUN apk add --no-cache \
    libpng \
    libpng-dev \
    libjpeg-turbo \
    libjpeg-turbo-dev \
    freetype \
    freetype-dev \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    bash \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring zip intl pdo pdo_mysql

# Create non-root user
RUN addgroup -S appgroup && adduser -S appuser -G appgroup

WORKDIR /app

# Copy PHP source code
COPY --link src/ ./src/
COPY --link database/ ./database/
COPY --link resources/ ./resources/
COPY --link composer.json ./

# Copy built assets from builder
COPY --from=assets-builder /app/resources/dist ./resources/dist

# Copy vendor from composer stage
COPY --from=composer-deps /app/vendor ./vendor

# Set permissions (if needed for runtime)
RUN chown -R appuser:appgroup /app

USER appuser

# Expose no ports (PHP-FPM runs on 9000 by default)
CMD ["php-fpm"]
