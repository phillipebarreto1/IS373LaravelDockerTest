#!/bin/sh

# Remove sqlite database file
rm sqlite_db/database.sqlite

# Create sqlite database file
php artisan migrate --env=testing --force

# Run unit tests
php artisan test --parallel --env=testing

