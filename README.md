# Nzymes
Version 3 of my undestructible [Enzymes](https://wordpress.org/plugins/enzymes/) plugin for WordPress.

[![Build Status](https://travis-ci.org/aercolino/nzymes.svg?branch=master)](https://travis-ci.org/aercolino/nzymes)


## Dev env

### Website

**~/dev/wordpress/website/docker-compose.yml**
```
version: '2'

services:
  dbms:
    image: mysql:5.7
    volumes:
      - db_data:/var/lib/mysql
    ports:
      - 32768:3306
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: wordpress
      MYSQL_DATABASE: wordpress
      MYSQL_USER: wordpress
      MYSQL_PASSWORD: wordpress

  wordpress:
    depends_on:
      - dbms
    build: ./docker/wordpress
    image: wordpress:xdebug
    volumes:
      - .:/var/www/html
    ports:
      - 8000:80
    restart: always
    environment:
      WORDPRESS_DB_HOST: dbms:3306
      WORDPRESS_DB_PASSWORD: wordpress
      XDEBUG_CONFIG: remote_host=192.168.1.33

volumes:
    db_data:
```

**~/dev/wordpress/website/docker/wordpress/Dockerfile**
```
FROM wordpress:4.7.3-php7.1-apache

RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini
```

#### Server Start
```
andrea at Lock-and-Stock in ~/dev/wordpress/website
$ docker-compose up
```

#### Client Start
```
http://0.0.0.0:8000/
```

### Build

```
andrea at Lock-and-Stock in ~/dev/wordpress/plugins/nzymes on master [!$]
$ rake nzymes:build
```


### Tests

```
andrea at Lock-and-Stock in ~/dev/wordpress/plugins/nzymes on master [!$]
$ bash bin/install-wp-tests.sh wordpress_test root '' localhost latest
$ vendor/bin/phpunit
```
