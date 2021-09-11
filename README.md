## Project Information
This is an APIs and Admin panel-based project for the Nuxt.js front-end app.

### Admin login
Browse admin panel with this url `/admin` and using admin user credentials to login. With dummy data:
```
Email: admin@admin.com
Password: password
```

### POSTMAN APIs collection
Here is the postman APIs collection to interact with API.
- https://www.getpostman.com/collections/f926c292f72b94261c33

### Layered Creating Custom Artisan Commands
Create Layers for Model; Repository, RepositoryInterface, Service, ServiceInterface.
```
php artisan make:layers Product
```
Create a new model Repository Interface
```
php artisan make:repository-interface Product
```
Create a new model Repository.
```
php artisan make:repository Product
```
Create a new model Service Interface.
```
php artisan make:service-interface Product
```
Create a new model Service.
```
php artisan make:service Product
```


## Installation Steps

### 1. Install the Packages

This Laravel application you can include the packages with the following command:

```bash
composer install
```

### 2. Add the DB Credentials & APP_URL

Next make sure to create a new database and add your database credentials to your .env file:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

You will also want to update your website URL inside of the `APP_URL` variable inside the .env file:

```
APP_URL=http://localhost:8000
```

### 3. Run Migration OR Import SQL OR Seed dummy data
#### Migration
- `php artisan migrate`

#### Import SQL
- SQL file location `database/sql/codertextapi.sql` 
- Import the sql file into your database to access dummy data.

#### Seed Data
- If you prefer seed dummy data then run `php artisan db:seed` with specific seed file using `--class` flag.


### 4. Run Necessary Commands

```bash
php artisan storage:link
```

And we're all good to go!

Start up a local development server And, visit [http://codertextapi.test/admin](http://codertextapi.test/admin).

## Creating an Admin User

You may wish to assign admin privileges to an existing user.
This can easily be done by running this command:

```bash
php artisan voyager:admin your@email.com
```

If you wish to create a new admin user you can pass the `--create` flag, like so:

```bash
php artisan voyager:admin your@email.com --create
```

And you will be prompted for the user's name and password.
