FROM php:8.2-cli

# Installe les extensions nécessaires
RUN apt-get update && apt-get install -y \
    unzip zip libzip-dev \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql zip

# Copie ton code dans le conteneur
COPY . /app
WORKDIR /app

# Expose le port
EXPOSE 10000

# Lancer le serveur PHP (change '.' si ton index.php est ailleurs)
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
