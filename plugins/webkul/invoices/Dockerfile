# syntax=docker/dockerfile:1

# --- Build Stage ---
FROM composer:2.7 AS vendor
WORKDIR /app
# Copy only composer files for dependency install
COPY --link composer.json ./
# Install dependencies (no dev, as this is a plugin, not a full app)
RUN composer install --no-dev --prefer-dist --no-interaction --no-scripts --no-progress

# --- Final Stage ---
FROM php:8.2-fpm-alpine AS final

# Install system dependencies and PHP extensions
RUN apk add --no-cache \
        libzip-dev \
        oniguruma-dev \
        icu-dev \
        bash \
    && docker-php-ext-install zip intl opcache

# Create non-root user
RUN addgroup -S appgroup && adduser -S appuser -G appgroup

WORKDIR /app

# Copy plugin source code
COPY --link src/ ./src/
COPY --link database/ ./database/
COPY --link resources/ ./resources/
COPY --link composer.json ./composer.json

# Copy installed vendor dependencies from build stage
COPY --from=vendor /app/vendor ./vendor

# Set permissions (if needed for runtime, e.g. for storage/logs)
# (Uncomment if your plugin writes to disk)
# RUN chown -R appuser:appgroup /app

USER appuser

# Default command (can be overridden)
CMD ["php", "-a"]

# Expose no ports (plugin container is not a standalone service)
# If you want to run tests or artisan commands, override CMD at runtime

# Note: This Dockerfile is for the invoices plugin only. It does not run a web server or Laravel app.
# To use this plugin, mount/copy it into your main app container as part of your build process.