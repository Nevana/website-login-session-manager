# PHP login
* Simple php login and session manager
# Installation (ubuntu server)
* Install an ubuntu server of your choise

* Notice that `sudo` rights are required!

* Pull the repository to your local machine!

* Install some necessary packages:

    * `sudo apt install php`
    * `sudo apt install sqlite3`
    * `sudo apt install php7.0-sqlite3`

* Copy the files to the right directory:
    
    * `sudo cp -r /your/location/or/the/folder /var/www/html/`

* It is recommended to place the database not in the `/var/www/html/` directory

* Move it to another directory:
    
    * e.g. `/var/www/db/login.db`

* You have to modify the db connection in file `login.php` (line 13)

* If you use your own database you have to modify also the sql query on line 26

* Restart you apache webserver:

    * `sudo service apache2 restart`

* Use your favourite webbrowser and connect to your website and try to login

* If you add a new php file to you website you have to include the `sessionCheck.php` file:

    * `vim /var/www/html/yourFile.php`:

    <?php
	    include 'sessionCheck.php';
    ?>

* You login and session manager is ready to use!
