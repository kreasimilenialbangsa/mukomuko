#!/bin/bash

echo "Pulling the latest changes..."
docker compose down

echo "Starting the containers with the latest build..."
docker compose up -d --build

echo "Fixing permissions..."
docker exec mukomuko-app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
docker exec mukomuko-app chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
docker exec mukomuko-app chown -R www-data:www-data /var/www/html/storage /var/www/html/public
docker exec mukomuko-app chmod -R 775 /var/www/html/storage /var/www/html/public

echo "Deployment completed successfully."
