# C-RDG-160-REM-1-1-yowl-benoit.dedicker

## Introduction

### How start the app?

#### API
1. Install MAMP/WAMP/XAMP
2. Launch the api
3. Start your MAMP/WAMP/XAMP server
4. In the root folder of the Laravel project (Yowl), run: 
```php:
php artisan serv
```
5. To install node_modules, run
```php:
npm install
```
6. To install all the related files, run:
```php:
composer install
```
7. Create a database in MySQL with the following name:
```php:
yowl
```
8. Add your database connection details to the .env file:
```php:
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=yowl
DB_USERNAME=
DB_PASSWORD=
```
9. Run the following command to import the tables into the database.
```php:
php artisan migrate
```

#### Front_End
1. In the root folder of the VueJS project (YowlVue), run:
```php:
npm install
```
2. To start the server:
```php:
npm run dev
```

### How to use the API

#### Endpoint

To access all the information via the API, please use the following endpoint:
```php:
http://localhost:8000/api/
```

##### General data

There are 5 main API endpoint you can use to get the information from the API:
```php:
http://localhost:8000/api/users
http://localhost:8000/api/categories
http://localhost:8000/api/responses
http://localhost:8000/api/likes
http://localhost:8000/api/reports
```
With those you can access, modify, add and remove data from the API by performing GET, PUT, POST and DELETE requests (you can use POSTMAN).

##### User Authentication

The backend of this app is based on a Laravel API, so, to perform all the user authentication tasks, there are custom API endpoints.

In order to register a new user, you can use the following endpoint (POST request):
```php:
http://localhost:8000/api/register
```
And provide the required information in the body of the request:
1. name
2. email
3. password
4. password_confirmation
5. date_of_birth

In order to login in, you can use:
```php:
http://localhost:8000/api/login
```
In the body of the request include:
1. email
2. password

This will generate a token that will be used to perform the requests that need authentication.

In order to logout, use the following endpoint:
```php:
http://localhost:8000/api/logout
```
This will remove the token that was generated during the login.



