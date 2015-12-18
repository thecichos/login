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