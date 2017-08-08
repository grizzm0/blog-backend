FROM php:7.1-fpm-alpine

COPY . /app
COPY ./docker/nginx.conf /etc/nginx/conf.d/default.conf

VOLUME ["/app"]
VOLUME ["/etc/nginx/conf.d"]
