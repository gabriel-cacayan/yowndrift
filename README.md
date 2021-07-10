# Yowndrift

### Stack used: Laravel Livewire


![yowndrift_landing](https://user-images.githubusercontent.com/61103022/120966869-6a2a1a80-c799-11eb-9ef3-acc61948e9cb.jpeg)


# To clone, run the following command in CLI: 

* `git clone git@github.com:gabriel-cacayan/yowndrift.git`
* `cd yowndrift`
* `composer update`
* `composer require laravel/socialite`
* `npm install && npm run dev`
* Create an `.env` file then copy all the code from `.env.example`.
* run `php artisan key:generate`
* add database to `.env` file
* `php artisan migrate --seed`
* Uncomment this code `URL::forceScheme('https');` in `Providers` > `AppServiceProvider.php` folder.
* `php artisan serve`
