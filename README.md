## Getting Started
- Clone the project on your local machine
- cd to the project folder and open in terminal
- Run *composer update* command to install the necessary packages
- Create your development database
- cp .env.example .env
- Add database name and database user credentials to .env
- Run *php artisan migrate* command
- Run *php artisan db:seed* command

## IMPORTANT NOTICE
-Running seeders will create the default user and role. See the seeders folder
-Permissions are implemented using spatie permissions package
