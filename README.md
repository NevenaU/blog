Clone the repository:
git clone -b master git@github.com:NevenaU/blog.git
cd blog

Build and start containers:
docker-compose up -d --build
docker-compose up -d


 Inside the app container:
docker-compose exec app bash
composer install
php artisan migrate
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache


 Inside the node container:
docker-compose exec node bash
npm install
npm run dev


cd src/storage/logs
touch laravel.logs
chown 777 /storage/logs/laravel.logs


docker-compose exec app bash
Command for sample data:
php artisan db:seed
Clear Laravel cache:
php artisan cache:clear


Web app: http://localhost:8080

phpMyAdmin: http://localhost:3400
Username: root
Password: password


