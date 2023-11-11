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
                


            //Select Database
                $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

                if(! $conn ) {
                    die('Could not connect: ' . mysqli_error($conn));
                }
                echo 'Connected successfully<br />';
                $retval = mysqli_select_db( $conn, 'ARCHONS' );
                if(! $retval ) {
                    die('Could not select database: ' . mysqli_error($conn));
                }
                echo "Database ARCHONS selected successfully\n";
                mysqli_close($conn);

            //Create Table
                $sql = "CREATE TABLE userpur_tbl( ".
                "userpur_id INT NOT NULL AUTO_INCREMENT, ".
                "userpur_title VARCHAR(100) NOT NULL, ".
                "userpus_name VARCHAR(40) NOT NULL, ".
                "PRIMARY KEY ( userpur_id )); ";
            if ($mysqli->query($sql)) {
                printf("Table userpur_tbl created successfully.<br />");
            }
            if ($mysqli->errno) {
                printf("Could not create table: %s<br />", $mysqli->error);
            }

            $mysqli->close();

            ?>


</body>
</html>