# Utilise PHP 8.2
FROM php:8.2-fpm

# Installation des dépendances système Linux
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    nginx \
    supervisor

# Nettoyage pour alléger l'image
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Installation des extensions PHP (PostgreSQL, GD, etc.)
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd

# Récupérer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Dossier de travail
WORKDIR /var/www

# Copier tout le projet dans le conteneur
COPY . .

# Installer les dépendances Laravel
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Permissions pour les dossiers de stockage
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Copier les configs Nginx et Supervisor
COPY ./docker/nginx.conf /etc/nginx/sites-available/default
COPY ./docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Exposer le port 80
EXPOSE 80

# Démarrer Supervisor
CMD ["/usr/bin/supervisord"]