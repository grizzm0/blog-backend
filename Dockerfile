FROM php:7.1-fpm-alpine

# Install PDO/PostgreSQL
RUN apk add --no-cache postgresql-dev && \
    docker-php-ext-install pdo pdo_pgsql

# Setup nginx
COPY ./docker/nginx.conf /etc/nginx/conf.d/default.conf

# Setup application
COPY . /app
RUN mkdir /app/data
RUN chown -R www-data:www-data /app

WORKDIR /app

VOLUME ["/app"]
VOLUME ["/etc/nginx/conf.d"]
