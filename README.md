INSTALLATION
Clone project, create the "filemanager" schema and run the following commands:

composer update

cp .env.example .env

php artisan key:generate

php artisan migrate

composer dump-autoload

php artisan db:seed

php artisan cache:clear

php artisan storage:link