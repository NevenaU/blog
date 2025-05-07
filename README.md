Clone the repository: git clone -b master git@github.com:NevenaU/blog.git

Enter the project directory: cd blog

Build and start containers:
build command: docker-compose up -d --build

start command: docker-compose up -d



Get inside the app container: docker-compose exec app bash
command: composer install

command: php artisan migrate

command: chown -R www-data:www-data storage bootstrap/cache

command: chmod -R 775 storage bootstrap/cache


Get inside the app container: docker-compose exec node bash
command install: npm install

command runn: npm run dev



cd src/storage/logs


touch laravel.logs

chown 777 /storage/logs/laravel.logs


docker-compose exec app bash

Sample data:
command: php artisan db:seed

Clear Laravel cache:
php artisan cache:clear


Web app: http://localhost:8080

phpMyAdmin: http://localhost:3400
Username: root
Password: password


