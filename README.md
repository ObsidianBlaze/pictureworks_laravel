# Content

Setup 

API DOC 

Terminal

Test

Blade

Version

## Link to the postman documentation

<https://documenter.getpostman.com/view/10977711/UzXPxGMN>

## After cloning the application, run the below command to setup
composer install

## Run the command below to seed the users into the database

php artisan migrate:fresh --seed

## Endpoints

Get a single User: {{base_url}}/api/v1/user/{id}

Update a users comment: {{base_url}}/api/v1/user/comment/{id}
BODY => password, comment

## Command line usage

php artisan user:comment {id}{comment}

## Run test with below command

./vendor/bin/phpunit


## Version NOTE

Laravel version -8
PHP version -7.3.29
