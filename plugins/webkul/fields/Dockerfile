# syntax=docker/dockerfile:1

# --- Build Stage: Install Composer dependencies ---
FROM composer:2.7 AS vendor

WORKDIR /app

# Copy only composer files for dependency caching
COPY --link composer.json ./
# If you have composer.lock, uncomment the next line
# COPY --link composer.lock ./

# Install dependencies (no scripts, no plugins, optimize autoloader)
RUN composer install --no-dev --prefer-dist --no-scripts --no-interaction --no-plugins --optimize-autoloader

# --- Final Stage: PHP Runtime ---
FROM php:8.2-fpm-alpine AS final

# Install system dependencies (if needed for PHP extensions)
RUN apk add --no-cache \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    && docker-php-ext-install pdo pdo_mysql zip intl

# Create non-root user
RUN addgroup -S appgroup && adduser -S appuser -G appgroup

WORKDIR /app

# Copy application code (excluding .git, .env, etc. via .dockerignore)
COPY --link . .

# Copy vendor from build stage
COPY --from=vendor /app/vendor ./vendor

# Set permissions (if needed)
RUN chown -R appuser:appgroup /app

USER appuser

# Expose no ports (this is a PHP-FPM container, port is managed by the process manager)

# Entrypoint (default for php-fpm)
CMD ["php-fpm"]
