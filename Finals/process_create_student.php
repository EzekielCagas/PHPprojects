<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $contact_number = $_POST["contact_number"];

    // TODO: Create SQL query for inserting data into the Student table
    $sql = "CREATE TABLE IF NOT EXISTS Student (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        dob DATE,
        address VARCHAR(255),
        contact_number VARCHAR(20)
    )";
    $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "Student added successfully";
    } else {
        echo "Error adding student: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
