# syntax=docker/dockerfile:1

# --- Build stage: Install Composer dependencies ---
FROM composer:2.7 AS vendor

WORKDIR /app

# Copy only composer files for dependency install
COPY --link composer.json ./
# If you have composer.lock, uncomment the next line
# COPY --link composer.lock ./

# Install dependencies to vendor/ (no scripts, no plugins for speed)
RUN composer install --no-dev --prefer-dist --no-scripts --no-interaction --no-progress

# --- Final stage: PHP runtime ---
FROM php:8.2-fpm-alpine AS final

# Install system dependencies (if needed for Laravel or extensions)
RUN apk add --no-cache \
    libpng \
    libjpeg-turbo \
    libzip \
    oniguruma \
    icu-libs \
    bash \
    && docker-php-ext-install pdo pdo_mysql zip intl

# Create non-root user
RUN addgroup -S appgroup && adduser -S appuser -G appgroup

WORKDIR /app

# Copy application code (excluding files in .dockerignore)
COPY --link . .

# Copy vendor from build stage
COPY --from=vendor /app/vendor ./vendor

# Set permissions (if needed for storage/logs/cache)
RUN mkdir -p storage/logs storage/framework/cache && \
    chown -R appuser:appgroup storage

USER appuser

# Expose PHP-FPM port (if running standalone)
EXPOSE 9000

# Default command (can be overridden)
CMD ["php-fpm"]
