FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    unzip zip libzip-dev libpq-dev default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

COPY . /app
WORKDIR /app

EXPOSE 10000
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
