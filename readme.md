<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Blog app 
To start the app please make this steps :
- create database.
- copy .env.example file and rname it to .env
- <b> change values of database connection</b> :   
    DB_CONNECTION=mysql<br/>
    DB_HOST=127.0.0.1<br/>
    DB_PORT=3306<br/>
    DB_DATABASE=blog<br/>
    DB_USERNAME=root<br/>
    DB_PASSWORD=root

- <b> open terminal  and write this commands</b>: 
    php artisan migrate <br/>
    php artisan db:seed <br/>
    php artisan serve <br/>
    
- <b> Demo users </b> : <br/>
    Admin User : admin@example.com
    password : 123456789
    User  : user@example.com <br/>
    password : 123456789

- <b>to check task please write this command</b> : 
    php artisan DeletePost:check
    
