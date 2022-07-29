# Content

[SETUP](#after-cloning-the-application-run-the-below-command-to-setup)

[API DOC](#link-to-the-postman-documentation)

[Terminal](#command-line-usage)

[Test](#run-test-with-below-command)

[Blade](#blade)

[Version](#version-note)

## After cloning the application, run the below command to setup

composer install

## Run the command below to seed the users into the database

php artisan migrate:fresh --seed

## Link to the postman documentation

<https://documenter.getpostman.com/view/10977711/UzXPxGMN>

## Endpoints

Get a single User: {{base_url}}/api/v1/user/{id}

Update a users comment: {{base_url}}/api/v1/user/comment/{id}
BODY => password, comment

## Command line usage

php artisan user:comment {id}{comment}

## Run test with below command

./vendor/bin/phpunit

## Blade

localhost:8000 => Homepage

localhost:8000/user/{id} => Get User

localhost:8000/user/comment/{id} => Update Comment

## Version NOTE

Laravel version -8
PHP version -7.3.29
