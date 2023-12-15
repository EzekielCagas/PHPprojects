<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Database</title>
    </head>
        <body>
            <?php
                $dbhost = 'localhost';
                $dbuser = 'root';
                $dbpass = '';
                $mysqli = new mysqli($dbhost, $dbuser, $dbpass);

            //Connection

                if($mysqli->connect_errno) {
                    printf("Failed to Connect: %s<br />", $mysqli->connect_error);
                    exit();
                }
                printf('Connected successfully.<br />');

            //Create Database
            
               /* if ($mysqli->query("CREATE DATABASE ARCHONS")) {
                    printf("Database ARCHONS created successfully.<br />");
                }
                if ($mysqli->errno) {
                    printf("Failed to create database: %s<br />", $mysqli->error);
                }*/

            ?>


</body>
</html>