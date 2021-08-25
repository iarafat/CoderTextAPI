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

### 3. Run Migration
If you prefer migrate it with dummy data then use `--seed` flag or run `php artisan db:seed` with specific seed files.

```bash
php artisan migrate
```


### 4. Run Necessary Commands

```bash
php artisan storage:link
```

And we're all good to go!

Start up a local development server with `php artisan serve` And, visit [http://localhost:8000/admin](http://localhost:8000/admin).

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
