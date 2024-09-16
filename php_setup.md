INSTRUCTION TO SETTING UP THIS TECHNICAL PROJECT
(please use docker xd)

Important: if php has been installed manually,
    in php/php.ini enable extension=zip, extension=fileinfo, extension=intl, extension=pdo_sqlite, extension=sqlite3

PROBLEM SECTION, which should actually not exist. Do in order after relevant item, if that did not work.
```
    (3?, 5?, 6) generate artisan key with > php artisan key:generate
    (6) in .env file set DB_DATABASE FULL path to `{path}/database/database.sqlite` (?https://stackoverflow.com/questions/72453831/ laravel-sqlite-database-does-not-exist)
    (6) after installation, if server won't start, do > php artisan migrate
```

0. download composer
https://getcomposer.org/download/

1.
init laravel
> composer create-project --prefer-dist laravel/laravel name

2.
optional:
> composer require livewire/livewire

\@livewireStyles -goes to head
\@livewireScripts -goes to body

3.
init livewire
> php artisan make:livewire name

4.
init filament
> composer require filament/filament

5.
init vendor
> php artisan vendor:publish --tag=filament-config

6.
local server run cmd
> php artisan serve
(localhost port 8000)