#!/usr/bin/env bash

set -e  # Avbryter skriptet vid första felet

echo "🔄 Copying environment variables..."
cp /etc/secrets/.env .env

echo "🎵 Running Composer..."
composer global require hirak/prestissimo || true
composer install --no-dev --optimize-autoloader --working-dir=/var/www/html

echo "🗑 Clearing caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "⚡ Caching config & routes..."
php artisan config:cache
php artisan route:cache

echo "🛠 Running fresh migrations..."
php artisan migrate:fresh --force

echo "🌱 Seeding database (fresh)..."
php artisan db:seed --force

echo "✅ Deployment complete!"
