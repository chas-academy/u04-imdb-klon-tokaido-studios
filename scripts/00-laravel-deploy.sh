#!/usr/bin/env bash
echo "Running composer"
cp /etc/secrets/.env .env
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html
echo "Caching config..."
php artisan cache:clear
php artisan config:cache
echo "Caching routes..."
php artisan route:cache





echo "🛠 Running fresh migrations..."
php artisan migrate:fresh --force

echo "🌱 Seeding database (fresh)..."
php artisan db:seed --force

echo "✅ Deployment complete!"
