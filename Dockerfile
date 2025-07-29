# Utilise une image officielle PHP avec serveur intégré
FROM php:8.2-cli

# Installe les extensions PHP nécessaires
RUN apt-get update && apt-get install -y unzip zip libzip-dev && docker-php-ext-install zip

# Copie ton projet dans le conteneur
COPY . /app
WORKDIR /app

# Expose le port que Render utilise
EXPOSE 10000

# Lance un serveur PHP sur le bon port
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
