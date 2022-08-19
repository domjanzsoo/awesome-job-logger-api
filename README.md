##configuration

Run `composer-install` to have all the dependencies needed.

Add your correct database configuration to the .env file. The database name required is awesome-logger.

Once your database host is running and it's accessed by the application, execute the migrations with `php artisan migrate` .

Run `php artisan db:seed` to create some dummy property records for the job log creator form.
