FROM php:8.2.12-apache-bullseye
WORKDIR /var/www/html
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV APP_ENV=local
ENV APP_DEBUG=true

# Install System Dependencies
RUN apt-get update && apt-get install git curl zip unzip -y

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u 1000 -d /home/user user
RUN mkdir -p /home/user/.composer && \
    chown -R user:user /home/user

# Copy project files
COPY . /var/www/html
RUN composer install

# Copy apache config to apache
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Run Program
#CMD ["php", "artisan", "serve"]
#EXPOSE 8000

RUN php artisan config:cache && \
    php artisan route:cache && \
    chmod 777 -R /var/www/html/storage/ && \
    chown -R www-data:www-data /var/www/ && \
    a2enmod rewrite

