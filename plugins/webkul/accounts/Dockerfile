# syntax=docker/dockerfile:1

# --- Build stage: install PHP dependencies ---
FROM composer:2.7 AS vendor

WORKDIR /app

# Copy only composer files for dependency install (faster cache)
COPY --link composer.json ./
# If you have a composer.lock, copy it as well (not present here)
# COPY --link composer.lock ./

# Install dependencies (no scripts, no dev)
RUN composer install --no-dev --no-scripts --prefer-dist --no-interaction --no-progress

# --- Final stage: PHP runtime ---
FROM php:8.2-fpm-alpine AS final

# Install system dependencies (if needed for PHP extensions)
RUN apk add --no-cache \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    bash \
    && docker-php-ext-install pdo pdo_mysql intl zip

# Create non-root user
RUN addgroup -S appgroup && adduser -S appuser -G appgroup

WORKDIR /app

# Copy vendor from build stage
COPY --from=vendor /app/vendor /app/vendor

# Copy the rest of the plugin source (excluding files via .dockerignore)
COPY --link . .

# Set permissions (if needed, e.g. for storage/logs/cache)
# RUN chown -R appuser:appgroup /app

USER appuser

# Expose PHP-FPM port (if running standalone)
EXPOSE 9000

CMD ["php-fpm"]
