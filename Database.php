<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>PHP MySQL Activity</title>
    </head>
    <body>
        <?php
            if(isset($_POST['add'])){
                $dbhost = 'localhost';
                $dbuser = 'root';
                $dbpass = '';
                $dbname = 'AGENTS';
                $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                //Database Connection
                if($mysqli->connect_errno){
                    printf("Connect failed: %s<br />", $mysqli->connect_errno);
                    exit();
                }
                printf('Connected Successfully.<br />');
                
/*              //Creating Database
                if($mysqli->query("CREATE DATABASE AGENTS")) { 
                    printf("Database AGENTS created successfully!<br />");
                }
                if($mysqli->errno){
                    printf("Failed to create Database: %s<br />", $mysqli->errno);
                }
*/              
                //Inserting Data
                if(function_exists("get_magic_quotes_gpc") && get_magic_quotes_gpc()) {
                    $code_name = addslashes ($_POST['code_name']);
                    $agent_role = addslashes ($_POST['agent_role']);
                } else {
                    $code_name = $_POST['code_name'];
                    $agent_role = $_POST['agent_role'];
                }
                $birth_date = $_POST['birth_date'];

                $sql_insert = "INSERT INTO agents_tbl ".
                    "(code_name,agent_role, birth_date) "."VALUES ".
                    "('$code_name','$agent_role','$birth_date')";
               
                //Selecting Database
                $retval = mysqli_select_db($mysqli, 'AGENTS');

                if(!$retval){
                    die('Could not select database: ' . mysqli_error($mysqli));
                }
                echo "Database AGENTS selected successfully.<br />";

/*
                //Creating Table
                $sql = "CREATE TABLE agents_tbl( ".
                    "agent_number INT NOT NULL AUTO_INCREMENT, ".
                    "code_name VARCHAR(150) NOT NULL, ".
                    "agent_role VARCHAR(150) NOT NULL, ".
                    "birth_date DATE, ".
                    "PRIMARY KEY ( agent_number )); ";
                if ($mysqli->query($sql)) {
                    printf("Table agents_tbl created successfully.<br />");
                }
                if ($mysqli->errno) {
                    printf("Could not create table: %s<br />", $mysqli->error);
                }
*/
                
                //Inserting Records
                $retval_insert = mysqli_query( $mysqli, $sql_insert );
            
                if(! $retval_insert ) {
                    die('Could not enter data: ' . mysqli_error($mysqli));
                }
                echo "Entered data successfully.<br />";

                //Selecting Records
                $sql_select = "SELECT agent_number, code_name, agent_role, birth_date FROM agents_tbl";
                $retval_select = mysqli_query( $mysqli, $sql_select );
                if(! $retval_select ) {
                    die('Could not get data: ' . mysqli_error($mysqli));
                }
                
                while($row = mysqli_fetch_array($retval_select, MYSQLI_ASSOC)) {
                    echo "Agent Number :{$row['agent_number']}  <br />".
                    "Code Name: {$row['code_name']} <br />".
                    "Agent Role: {$row['agent_role']} <br />".
                    "Birth Date : {$row['birth_date']} <br />".
                    "--------------------------------<br />";
                } 
                echo "Fetched data successfully.<br />";

                $mysqli->close();
            } else {
        ?>
        <form method = "post" action = "<?php $_PHP_SELF ?>">
            <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
                <tr>
                    <td width = "250">Code Name</td>
                    <td><input name = "code_name" type = "text" id = "code_name"></td>
                </tr>         
                <tr>
                    <td width = "250">Agent Role</td>
                    <td><input name = "agent_role" type = "text" id = "agent_role"></td>
                </tr>         
                <tr>
                    <td width = "250">Birth Date [   yyyy-mm-dd ]</td>
                    <td><input name = "birth_date" type = "text" id = "birth_date"></td>
                </tr>      
                <tr>
                    <td width = "250"> </td>
                    <td></td>
                </tr>         
                <tr>
                    <td width = "250"> </td>
                    <td><input name = "add" type = "submit" id = "add"  value = "Add Agent"></td>
                </tr>
            </table>
        </form>
    <?php
        }
    ?>
    </body>
</html>
=======
    <head >
>>>>>>> c993f7c6574d851a07aedb052037b83f9c80eb42
