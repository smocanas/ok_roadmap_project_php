# Basic project configuration

1. Copy `driving_school/sites-enabled/vhosts.conf.exemple` to a new file `driving_school/sites-enabled/vhosts.conf` and make changes to the server name if you want another address for the app (http://driving-school.domain is the generic one).
2. Copy `docker-compose.example.yml` to a new file `docker-compose.yml` and make necessary changes to ip addresses
3. Add the address from `docker-compose.yml` and `vhosts.conf` to `hosts` config file from `Windows/System32/drivers/etc`
```
127.0.0.99 driving-school.domain
[ip-address-from-docker-compose] [address-from-vhosts]
```

# Building and starting the container

1. Run `docker-compose build local_driving_school` in order to build the container
2. Run `docker-compose up local_driving_school` in order to start the container. Use `-d` parameter for detached mode.