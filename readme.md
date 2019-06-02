# Dynamic Form Builder API

This project is a dynamic form builder API that allows the creation of forms with any number of the below supported fields. 

It also can save form submissions. 

NOTE: This API currently does not have any authentication which is recommend if its going to be used in a production environment.

## Supported Fields

* Input
* TextArea
* Dropdown Menu
* File (Not completed)

## How do I get set up locally?

1. Run composer install `composer install`
2. Install [Traefik](https://traefik.io/) 
3. Build and Start the containers `docker-compose up -d`
4. Add a host hack for `127.0.0.1 local.formbuilder.com`

## How do I run tests? 

#### Locally

Must have PHP installed locally.

1. Run `vendor/bin/phpunit`

### Inside the container

Logging in first:

1. Login to the container `docker exec -it formbuilder_app bash`
2. Run `vendor/bin/phpunit`

Without logging in:

1. Run `docker exec -it formbuilder_app vendor/bin/phpunit`

## To Do

* Complete File support (Save uploaded files)
* Add dynamic validation for submissions
* Add logging
* Add endpoint documentation
* Add authentication
* Add support for more field
