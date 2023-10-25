FROM php:8.2-apache

RUN apt-get update && apt-get install -y screen
RUN apt-get install -y nano
RUN apt-get install -y ca-certificates
RUN apt-get install -y mc
RUN apt-get install -y libcurl3-openssl-dev
RUN apt-get install -y ssh
RUN apt-get install -y exiftool
RUN apt-get install -y curl
RUN apt-get install -y msmtp
RUN apt-get install -y mariadb-client
RUN apt-get install -y git
RUN apt-get install -y subversion
RUN apt-get install -y wget
RUN apt-get install -y libfreetype6-dev
RUN apt-get install -y libjpeg62-turbo-dev
RUN apt-get install -y libmcrypt-dev
RUN apt-get install -y libpng-dev
RUN apt-get install -y libgmp-dev
RUN apt-get install -y libxml2-dev
RUN apt-get install -y libxslt-dev
RUN apt-get install -y zlib1g-dev
RUN apt-get install -y libldap2-dev
RUN apt-get install -y libicu-dev
RUN apt-get install -y libmemcached-dev
RUN apt-get install -y libcurl4-openssl-dev
RUN apt-get install -y libssl-dev
RUN apt-get install -y libsqlite3-dev
RUN apt-get install -y iputils-ping
RUN apt-get install -y libzip-dev
RUN apt-get install -y zip
RUN apt-get install -y expect

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

RUN pecl install memcached \
    pecl install xdebug-3.2.2 \
    pecl install apcu \
    pecl install mcrypt

RUN docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu && \
    docker-php-ext-install ldap
RUN docker-php-ext-configure mysqli --with-mysqli=mysqlnd && \
    docker-php-ext-install mysqli
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/lib && \
    docker-php-ext-install gd
RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd && \
    docker-php-ext-install pdo_mysql

RUN docker-php-ext-install soap
RUN docker-php-ext-install intl
RUN docker-php-ext-install gmp
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install zip
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install ftp
RUN docker-php-ext-install sockets

RUN docker-php-ext-enable apcu
RUN docker-php-ext-enable xdebug
RUN docker-php-ext-enable mcrypt

WORKDIR /var/www
