# Installation instruction

## Clone

Clone the repo

```
git clone 'link'
```

## Configure the Application

Install vendor dependencies and edit the configuration file:
```
composer install
cp .env.example .env
```

Edit the `.env` file and put the configuration variable values inside.

Set `APP_KEY` value in your `.env` file:
```
php artisan key:generate
```

## Run the Migrations

```
php artisan migrate
```
Run the seeder
```
php artisan db:seed --class=AdviserSeeder
```

## Run the Application
Run this command:

```
php artisan serve
```
Open the generated URL and you should see the login page.

Use these credentials for login as an adviser:


Email: admin@admin.ru

Password: admin123
