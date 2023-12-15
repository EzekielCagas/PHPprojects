<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
</head>
<body>
    <h2>Student Information</h2>
    
    <?php
    // Paste the PHP code for retrieving and displaying data here
    $servername = "localhost";
    $username = "root";
    $password = ""; // Use your actual password if set
    $dbname = "CAGAS";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to retrieve data from the Student table
    $sql = "SELECT * FROM Student";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . "<br>";
            echo "First Name: " . $row["first_name"] . "<br>";
            echo "Last Name: " . $row["last_name"] . "<br>";
            echo "Date of Birth: " . $row["dob"] . "<br>";
            echo "Address: " . $row["address"] . "<br>";
            echo "Contact Number: " . $row["contact_number"] . "<br><hr>";
        }
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();
    ?>
    
</body>
</html>
