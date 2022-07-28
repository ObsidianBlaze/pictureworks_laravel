# Link to the postman documentation

<https://documenter.getpostman.com/view/10977711/UzXPxGMN>

## Run the command below to seed the users into the database

php artisan migrate:fresh --seed

## Endpoints

Get a single User: {{base_url}}/api/v1/user/{id}

Update a users comment: {{base_url}}/api/v1/user/comment/{id}
BODY => password, comment
