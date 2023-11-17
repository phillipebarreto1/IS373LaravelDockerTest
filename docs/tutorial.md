# Laravel Tutorial
### Salmaan Saeed
### Phillipe Barreto

## Framework
Laravel is a Framework based on the web development language PHP. Laravel is an accessible, powerful, and expressive framework that provides all the tools necessary for large applications
Luckily for us, laravel has extensive documentation that makes it very easy to work with the framework. 
To begin working with Laravel, clone this repository and download docker!
Once cloned, follow the directions below to launch your first Laravel app:
### Run Laravel Docker image
change directory to laravel-app in your IDE
```
cd laravel-app
```

Start Laravel Docker image in your IDE
```
docker-compose build
docker-compose up
```
This should get your laravel app up and running. You can check this by typing in your browser:
```
localhost
```
or 
```
127.0.0.1
```
You should be greeted with a Laravel web page
## Migrations
Migrations in Laravel are essentially a version control (like github) for a database. It allows you to easily work with the same database with your team.
To start, type the command:
```
php artisan make:migration create_anyTableName_table
```
If this does not work and you are greeted with an error stating artisan file not found, run the command:
```
composer install
```
Following this, you can perform a migration by running the following command in your terminal:
```
php artisan migrate
```

This command re-creates/Updates the entire database in case you need to refresh the database:
```
php artisan migrate:refresh
```
That is all there is to migrations!

## Modeling
To create a model, simply run the following command in your terminal:
```
php artisan make:model ModelName
```
This will create a model in your app/Models folder

## Factories
Model Factories are next.

To create a factory, run the following command in your terminal:
```
php artisan make:factory nameFactory
```
You will find the factory in your app/database/factories directory. You will need to go in and type in the attributes you desire for your table

To input records using a factory, you will need to do the follwoing in yout terminal:
Open Psy shell
```
php artisan tinker
```

Create a fake movie
```
\App\Models\ModelName::factory()->create();
```

## Seeding
After factories comes seeding your database.
To begin seeding, run the command:
```
php artisan make:seeder nameSeeder
```
This command will be used to input a designated amount of records in your database after configuration:
```
php artisan db:seed --class=MovieSeeder
```

## Database Testing
Finally, you must test your database!
We are using a sqlite instance to simplify the testing.
To begin, go to the laravel docker container as an interactive container instance
```
docker exec -it 498c49e4e6d8 bash
```

Remove the sqlite database if there is data in it
```
rm sqlite_db/database.sqlite
```

Migrate the database of the testing environment
```
php artisan migrate --env=testing
```

Run the unit tests
```
php artisan test --parallel --env=testing
```
## Completion
You should now be set up with laravel!