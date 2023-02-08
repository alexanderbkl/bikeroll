#download and install laragon
put this project inside laragon\www\bikeroll
Copy .env.example into .env file
Run commands:
#$composer install
#$php artisan migrate
#$php artisan migrate:refresh?
#$php artisan migrate --path=/database/migrations/create_courses.php
php artisan migrate --path=/database/migrations/create_roles.php
#$yarn
#$yarn dev
