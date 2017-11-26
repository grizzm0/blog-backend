FROM php:7.1-fpm-alpine

# Install PDO/PostgreSQL
RUN apk add --no-cache postgresql-dev && \
    docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www
