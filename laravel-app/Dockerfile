FROM debian:stable-slim
WORKDIR /var/www/html
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV APP_ENV=local
ENV APP_DEBUG=true
ARG DEBIAN_FRONTEND=noninteractive

# Install System Dependencies
RUN apt-get update && apt-get install git curl zip unzip php8.2 php8.2-common php8.2-mysql php8.2-xml php8.2-curl php8.2-xdebug php8.2-sqlite php8.2-mbstring apache2 -y

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . /var/www/html
RUN composer install

# Copy apache config to apache
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN php artisan config:cache && \
    php artisan route:cache && \
    chmod 777 -R /var/www/html/storage/ && \
    chmod 777 -R /var/www/html/sqlite_db/ && \
    chown -R www-data:www-data /var/www/ && \
    a2enmod rewrite

EXPOSE 80
CMD apachectl -D FOREGROUND

