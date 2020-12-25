# E-Commerce Store Final Project

## Initial Configuration
This application requires composer and laravel pre-installed in the computer in order for it to work. The following link provides the guide on how to set up Laravel for the first time.

Composer installation -
https://getcomposer.org/doc/00-intro.md

Laravel installation for version 8.x -
https://laravel.com/docs/8.x/installation

### Steps to run the application:
1. Import `ecom_final.sql` to PhpMyAdmin. This file is available in the project directory when it is cloned from this repository.

2. In order for the database to properly work, please kindly configure the `.env` file first. The following information needs to be adjusted according to your PhpMyAdmin database parameters:
> `DB_PORT=`   
> `DB_DATABASE=`  
> `DB_USERNAME=`  
> `DB_PASSWORD=`

3. Utilizing the terminal, please move to the project's directory and run `php artisan serve`. Alternatively, this can be done using the IDE's terminal.

4. Access the application by accessing `http://127.0.0.1` followed by `:` and your laravel's `port` number. As an example: `http://127.0.0.1/8000`. 

