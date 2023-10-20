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
