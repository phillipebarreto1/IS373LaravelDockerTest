# Laravel ORM Commands

## Make Commands
Make a Movie Model
```
php artisan make:model Movie
```

Make a Movie Factory
```
php artisan make:factory MovieFactory
```

Make a Movie Seeder
```
php artisan make:seeder MovieSeeder
```

## Migration Commands

Perform a Migration 
```
php artisan migrate
```

Re-creates/Updates the entire database
```
php artisan migrate:refresh
```

## Thinker Commands

Open Psy shell
```
php artisan tinker
```

Create a fake movie
```
\App\Models\Movie::factory()->create();
```

## Database Commands

Generate Movie Seeder

```
php artisan db:seed --class=MovieSeeder
```