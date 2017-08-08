FROM php:7.1-fpm-alpine

# Install PDO/PostgreSQL
RUN apk add --no-cache postgresql-dev && \
    docker-php-ext-install pdo pdo_pgsql

COPY . /app
COPY ./docker/nginx.conf /etc/nginx/conf.d/default.conf

WORKDIR /app

VOLUME ["/app"]
VOLUME ["/etc/nginx/conf.d"]
