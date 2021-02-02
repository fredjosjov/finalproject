# E-Commerce Store Final Project

## Initial Configuration
This application requires composer and laravel pre-installed in the computer in order for it to work. The following link provides the guide on how to set up Laravel for the first time.

Composer installation -
https://getcomposer.org/doc/00-intro.md

Laravel installation for version 8.x -
https://laravel.com/docs/8.x/installation

### Steps to run the application:
1. Rename the `env.example` into `.env` in the file directory.

2. Import the following file: `ecom_final.sql` to the database . Alternatively:  
   >  - `ecom_final_schema.sql` to create the database schema.
   >  - `ecom_final_data.sql` to fill the database.  
   > 
   >  **Note:** That all these database related files are available on the project's directory.
   
3. In order for the database to properly work, please kindly configure the `.env` file first. The following information needs to be adjusted according to your PhpMyAdmin database parameters:
> `DB_PORT=`   
> `DB_DATABASE=ecom_final`  
> `DB_USERNAME=`  
> `DB_PASSWORD=`

4. (Optional) If you only import `ecom_final_schema.sql`, Seed the newly created database by running `php artisan db:seed` using your project's terminal.

5. Utilizing the terminal, please move to the project's directory and run `php artisan serve`. Alternatively, this can be done using the IDE's terminal.

6. Access the application by accessing `http://127.0.0.1` followed by `:` and your laravel's `port` number. As an example: `http://127.0.0.1/8000`. 

7. In case there is an error running `php artisan serve` please kindly reinstall the dependency in the project folder by doing the following:
    1. Using the terminal, move into the project's directory. (or simply open the project's IDE terminal)
    2. Run `sudo rm -rf vendor/` (basically remove the `vendor/` directory from the project. Windows user can adjust the command script accordingly)
    3. Run `sudo rm composer.lock` (Removing the `composer.lock` file from the project directory)
    4. Run `composer install`.
    

