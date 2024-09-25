#!/bin/bash

echo "Pulling the latest changes..."
sudo docker compose down

echo "Starting the containers with the latest build..."
sudo docker compose up -d --build

echo "Fixing permissions..."
sudo docker exec mukomuko-app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
sudo docker exec mukomuko-app chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
sudo docker exec mukomuko-app php artisan storage:link
sudo docker exec mukomuko-app chown -R www-data:www-data /var/www/html/storage /var/www/html/public
sudo docker exec mukomuko-app chmod -R 775 /var/www/html/storage /var/www/html/public

echo "Deployment completed successfully."
