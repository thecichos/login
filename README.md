# Login
## Connect to the database
- Create ```connection.php``` in /php/
- add this:
```php
<?php

    $servername = "SERVERNAME";
    $username = "USERNAME";
    $password = "PASSWORD";
    $dbName = "DATABSE_NAME";

    $_conn = new mysqli($servername, $username, $password, $dbName);
    if ( $_conn->connect_error )
        die("Connection Error");
?>
```
- Save and everything should work, else create an issue.

# NPM
*ONLY REALLY USEFUL WHEN WRITING SASS ATM*
When developing on the site, launch a terminal in the root folder and run: ```npm install``` and wait for it to install the packages. Grunt is atm only used to compile the SASS file(s), this can be changed to watch other files aswell.