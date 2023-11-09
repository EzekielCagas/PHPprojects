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

                if($mysqli->connect_errno ){
                    printf("Conncet failed: %s<br> />", $mysqli->connect_error);
                    exit();
                }
                printf('Connected successfully.<br />');
                
                if($mysqli->query("CREATE DATABASE ARCHONS")){
                    printf("Database ARCHONS created successfully.<br />");
                }
                if($mysqli->errno){
                    printf("Failed to create database: %s<br />", $mysqli->error);
                }
                
                $gods = "CREATE TABLE Usurper(".
                                        "usurper_id INT NOT NULL AUTO_INCREMENT, ".
                                        "element_resonance VARCHAR(100) NOT NULL, ".
                                        "archon_title VARCHAR(100) NOT NULL, ".
                                        "PRIMARY KEY ( usurper_id )); ";
                if ($mysqli->query($sql)){
                    printf("Table ARCHONS created successfully.<br />");
                }
                if ($mysqli->errno){
                    printf("Failed to create table: %s<br />", $mysqli->error);
                }
                
                
                $mysqli->close();
            
            ?>


</body>
</html>