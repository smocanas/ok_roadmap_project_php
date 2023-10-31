# Basic project configuration

1. Go to `.docker/driving-school/`
2. Copy `.env.example` to a new file `.env` and replace the **** with suitable constants.
3. Copy `.env.nginx` to a new file `.env.nginx.local` and add the wanted domain name for accessing the project in future.

# Building and starting the container

1. Go to `.docker/driving-school/`
2. Run `docker-compose build` in order to build the all containers. (or you can skip to point nr.3 if you don't need explicit information about the build, this point will be done automatically also)
2. Run `docker-compose up` in order to start all containers. Use `-d` parameter if you prefer detached mode.
3. Go inside the php container using `docker-compose exec php bash` and run the `composer install` command.