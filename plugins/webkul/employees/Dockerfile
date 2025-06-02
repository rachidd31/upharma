# syntax=docker/dockerfile:1

# --- Build stage: install PHP dependencies ---
FROM composer:2.7 AS composer-deps

WORKDIR /app

# Copy only composer files for dependency caching
COPY --link composer.json ./
# If you have a composer.lock, copy it as well (not present here)
# COPY --link composer.lock ./

# Install dependencies (no scripts, no plugins, optimize autoloader)
RUN composer install --no-scripts --no-plugins --prefer-dist --no-dev --classmap-authoritative

# --- Final stage: PHP runtime ---
FROM php:8.2-fpm-alpine AS final

# Install system dependencies (if needed for extensions)
RUN apk add --no-cache \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    bash \
    && docker-php-ext-install intl zip pdo pdo_mysql

# Create non-root user
RUN addgroup -S appgroup && adduser -S appuser -G appgroup

WORKDIR /app

# Copy PHP source code (excluding .git, .env, etc. via .dockerignore)
COPY --link . .

# Copy installed vendor from build stage
COPY --from=composer-deps /app/vendor ./vendor

# Set permissions (if needed for storage/logs, not present in this plugin)
# RUN chown -R appuser:appgroup /app

USER appuser

# Default command (can be overridden)
CMD ["php-fpm"]
