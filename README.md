# Laravel practical demo

## Description
This is a Laravel project for practical demo.

## Setup
<!-- 1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/laravel-project.git -->
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Copy `.env.example` to `.env` and configure your environment variables:
    ```bash
    cp .env.example .env
    ```

4. Generate application key:
    ```bash
    php artisan key:generate

5. Migrate the database:
    ```bash
    php artisan migrate
    ```
6. Seed the database with roles and users:
    ```bash
    php artisan db:seed
    ```   

## Usage
- To start the development server, run:
    ```bash
    php artisan serve
    ```

- Visit `http://127.0.0.1:8000/` in your browser to view the application.
- Visit `http://127.0.0.1:8000/admin/login` in your browser to view the login page.