# IS373LaravelDockerTest

### To start, change directory with cd laravel-app.
### Then, build up the image with and check your docker to make sure the container is up and running with ./vendor/bin/sail up

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
docker image tag watchtower:latest sagedemage/watchtower:latest
```
