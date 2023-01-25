# FreeAds
- Here is my ad website project in Laravel 9.9.0 where you can create an account and post some ads !

## For use :
- Import database "freeads.sql"
- Download composer https://getcomposer.org/download/
- Pull project.
- Rename `.env.example` file to `.env` inside your project root and fill the database information.
- Open the console and cd your project root directory
- Run `composer install` or ```php composer.phar install```
- Run `php artisan key:generate` 
- Run `php artisan migrate`
- Run `php artisan serve`

##### You can now access your project at localhost :)

## If for some reason your project stop working do these:
- `composer install`
- `php artisan migrate`
