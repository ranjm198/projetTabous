# Utilise une image officielle PHP
FROM php:8.2-cli

# Installe les extensions nécessaires
RUN apt-get update && apt-get install -y unzip zip libzip-dev && docker-php-ext-install zip

# Copie les fichiers du projet
COPY . /app
WORKDIR /app

# Commande de démarrage du serveur PHP
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
