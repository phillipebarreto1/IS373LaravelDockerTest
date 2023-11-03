FROM ubuntu:latest
WORKDIR /var/www/html
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV APP_ENV=local
ENV APP_DEBUG=true
ARG DEBIAN_FRONTEND=noninteractive

# Install System Dependencies
RUN apt-get update && apt-get install git curl zip unzip php8.1 php8.1-common php8.1-mysql php8.1-xml php8.1-curl apache2 -y

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
    chown -R www-data:www-data /var/www/ && \
    a2enmod rewrite

EXPOSE 80
CMD apachectl -D FOREGROUND

