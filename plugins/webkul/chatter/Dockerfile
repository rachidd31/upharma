# syntax=docker/dockerfile:1

# --- Build stage: install PHP dependencies ---
FROM composer:2.7 AS vendor
WORKDIR /app
# Copy only composer files for dependency caching
COPY --link composer.json ./
# If you have a composer.lock, copy it as well (uncomment next line)
# COPY --link composer.lock ./
RUN composer install --no-dev --prefer-dist --no-scripts --no-interaction --no-progress

# --- Application stage ---
FROM php:8.2-fpm-alpine AS app

# Install system dependencies and PHP extensions
RUN apk add --no-cache \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    bash \
    && docker-php-ext-install pdo pdo_mysql zip intl

# Create non-root user
RUN addgroup -S appgroup && adduser -S appuser -G appgroup

WORKDIR /app

# Copy PHP dependencies from vendor stage
COPY --from=vendor /app/vendor ./vendor

# Copy application code (excluding files via .dockerignore)
COPY --link . .

# Set permissions (if needed, adjust for your app's needs)
RUN chown -R appuser:appgroup /app

USER appuser

# Expose PHP-FPM port
EXPOSE 9000

# Set the default command to run PHP-FPM
CMD ["php-fpm"]
