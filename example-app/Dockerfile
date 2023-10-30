FROM php:cli-bookworm
WORKDIR /app
RUN apt install composer
COPY . .
RUN composer install
CMD ["php" "artisan" "serve"]