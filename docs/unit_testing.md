# Unit Testing

Go to the laravel docker container as an interactive container instance
```
docker exec -it 498c49e4e6d8 bash
```

Remove the sqlite database if there is data in it
```
rm sqlite_db/database.sqlite
```

Migrate the database of the testing environment
```
php artisan migrate --env=workflow
```

Run the unit tests
```
php artisan test --parallel --env=workflow
```