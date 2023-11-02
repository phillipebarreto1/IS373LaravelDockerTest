# IS373LaravelDockerTest

## Run Laravel Docker image
change directory to laravel-app
```
cd laravel-app
```

Start Laravel Docker image
```
./vendor/bin/sail up
```

## Run Watch Tower Docker Image
Setup Network for Watch Tower
```
docker network create backend
```

Run watch tower docker image
```
docker compose up
```

## Push docker image to docker hub
Login to Docker
```
docker login
```

Commit the image
```
docker container commit c16378f943fe watchtower:latest
```

Create tag for the docker image
```
docker image tag watchtower:latest sagedemage/watchtower:latest
```

Push image to docker hub
```
docker image push sagedemage/watchtower:latest
```
## Laravel Migrations
Be on the laravel-app directory, if you are not run the command cd laravel-app

Make sure mysql server is running on docker

Use a database management system (in our case it is mysql workbench) to connect to the database

In order to do the above, check your .env file to make sure it alligns with what the root login should be

Once connected, you can create a model and migrate all in the same command:
php artisan make:model -m

In our case, the initial model was for movies, so we use the command php artisan make:model Movie -m
This command makes a movie model and movies table all at once

Final command after this is completed will be:
php artisan migrate
 This migrates all models and tables created.
 
