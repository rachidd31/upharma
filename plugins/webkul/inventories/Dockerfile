# syntax=docker/dockerfile:1

# --- Build Stage ---
FROM composer:2.7 AS vendor
WORKDIR /app
# Copy only composer files first for better cache utilization
COPY --link composer.json ./
# If you have composer.lock, copy it as well (not present here)
RUN composer install --no-dev --prefer-dist --no-scripts --no-interaction --no-progress

# --- Application Stage ---
FROM php:8.2-fpm-alpine AS app

# Install system dependencies and PHP extensions
RUN apk add --no-cache \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    bash \
    && docker-php-ext-install pdo pdo_mysql intl zip opcache

# Create non-root user
RUN addgroup -S appgroup && adduser -S appuser -G appgroup

WORKDIR /app

# Copy application code
COPY --link . .

# Copy installed vendor dependencies from build stage
COPY --from=vendor /app/vendor ./vendor

# Set permissions (if needed for storage/logs, adjust as necessary)
# RUN chown -R appuser:appgroup /app

USER appuser

# Expose PHP-FPM port (if running standalone, otherwise handled by web server)
EXPOSE 9000

CMD ["php-fpm"]
