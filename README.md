<h1 align="center">Laravel Broadcasting</h1>
<p align="center"><a href="https://github.com/josuapsianturi/velflix/blob/main/LICENSE"><img src="https://poser.pugx.org/cpriego/valet-linux/license.svg" alt="License"></a>
</p>

## About

This project is an example of how websockets work, how to listen for messages on frontend and how to broadcast them on backend with Laravel 

> **Note**
>   Work is still in Progress

> **Note**
>   I will surely write tests soon

## Table of Contents

* [Requirements](#requirements)
* [Installation](#installation)
* [Testing](#testing)
* [License](#license)

<a name="requirements"></a>
## Requirements

Package | Version
--- | ---
[Node](https://nodejs.org/en/) | V16.16.0+
[Npm](https://nodejs.org/en/)  | V8.11.0+ 
[Composer](https://getcomposer.org/)  | V2.2.5+
[Php](https://www.php.net/)  | V8.1+
[Mysql](https://www.mysql.com/)  |V5.7+

<a name="installation"></a>
## Installation

> **Warning**
>   Make sure to follow the requirements first.

Here is how you can run the project locally:
1. Clone this repo
    ```sh
    git clone https://github.com/muxailk/laravel-broadcasting.git
    ```

1. Go into the project root directory
    ```sh
    cd laravel-broadcasting
    ```

1. Copy .env.example file to .env file
    ```sh
    cp .env.example .env
    ```
1. Create database `broadcasting`

1. Go to `.env` file 
    - Set database credentials
    ```sh
    DB_DATABASE=broadcasting 
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    - Make sure to follow your database username and password
    - Set up pusher
    ```sh
    BROADCAST_DRIVER=pusher
    ```
     ```sh
    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_HOST=
    PUSHER_PORT=443
    PUSHER_SCHEME=https
    PUSHER_APP_CLUSTER=mt1
    ```
1. Install PHP dependencies 
    ```sh
    composer install
    ```

1. Generate key 
    ```sh
    php artisan key:generate
    ```

1. install front-end dependencies
    ```sh
    npm install && npm run dev
    ```

1. Run migrations and seeders
    ```
    php artisan migrate --seed
    ```
    this command will create only admin:
     > email: admin@mail.com , password: 3jkpmv3put0ndx3q0t83

1. Run server 
    ```sh
    php artisan serve
    ```  

1. Run queue worker  
    ```sh
    php artisan queue:work
    ```  

1. Visit `localhost:8000` in your favourite browser

Login with admin credentials or register new account, after that you'll be redirected to dashboard where everything goes by itself. Just enjoy the show)

<a name="testing"></a>
## Testing

> **Warning** <br>
> Tests are being written right now. Be sure.



<a name="license"></a>

## License
Laravel Blog is an open-sourced software licensed under [the MIT license](https://github.com/muxailk/laravel-broadcasting/blob/main/LICENSE)
