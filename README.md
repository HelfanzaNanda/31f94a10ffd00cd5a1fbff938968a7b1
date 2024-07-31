
# Levart Api

this is Test Levart API


## Installation

#### Clone
Install project with composer

```bash
  git clone https://github.com/HelfanzaNanda/31f94a10ffd00cd5a1fbff938968a7b1.git
```
    
#### Docker
```bash
  composer install
  docker build -t levart-api:latest -f docker/php-fpm/Dockerfile .
  docker-compose up -d
```
## Environment Variables

To run this project, you will need to add the following environment variables to your 

- config/db.php

`DB_DRIVER`

`DB_NAME`

`DB_USER`

`DB_PASSWORD`

`DB_HOST`

`DB_PORT`

- config/smtp.php


`SMTP_HOST`

`SMTP_PORT`

`SMTP_USER`

`SMTP_PASSWORD`

`SMTP_FROM_EMAIL`

`SMTP_FROM_NAME`



## Running

For to The Running, import the postman collection

### Migrate
```
    docker exec -it levart-php bash
    php bin/doctrine.php orm:schema-tool:update --force --dump-sql   
```

### Seeders
```
    open your postman
    import postman collection
    run Seed Request
```

### Run Queue

```
    docker exec -it levart-php bash
    php bin/Run.php
```
## Credentials


Login

- body
```
username : admin
password : password
grant_type : password
```


- Authorization 
```
username : testclient
password : testsecret
```