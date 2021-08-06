# Laravel Blog Project

Demo application for publishing blog posts.

## Installation

1. First clone this repository. Navigate to project folder.</br>

2. Install composer dependencies:</br>

    ```
    composer install
    ```

3. Create .env file (copy from .env.example).</br>
   Generate app key:

    ```
    php artisan key:generate
    ```

4. Create empty DB and set up .env file with database information.</br>

    ```
    php artisan db
    create database blog
    ```

5. Run initial migrations and seeders</br>

    ```
    php artisan migrate --seed
    ```
