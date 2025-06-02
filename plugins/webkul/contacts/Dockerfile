# syntax=docker/dockerfile:1

# --- Build Stage ---
FROM composer:2.7 AS vendor
WORKDIR /app
# Copy only composer files for dependency install
COPY --link composer.json ./
# If you have composer.lock, copy it as well (uncomment next line)
# COPY --link composer.lock ./
RUN composer install --no-dev --prefer-dist --no-scripts --no-interaction --no-progress

# --- Application Stage ---
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

# Copy application code
COPY --link src/ ./src/
COPY --link resources/ ./resources/
# If you have database, migrations, or seeders, copy as needed
# COPY --link database/ ./database/
# COPY --link public/ ./public/

# Copy installed vendor dependencies from build stage
COPY --from=vendor /app/vendor ./vendor

# Set permissions (if needed)
RUN chown -R appuser:appgroup /app

USER appuser

# Expose PHP-FPM port (if running standalone)
EXPOSE 9000

# Default command (can be overridden)
CMD ["php-fpm"]
