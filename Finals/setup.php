<?php
$servername = "localhost";
$username = "root";
$password = "";

function createDatabase($conn) {
    $sqlCreateDB = "CREATE DATABASE IF NOT EXISTS Cagas";
    if ($conn->query($sqlCreateDB) === TRUE) {
        echo "Database created successfully<br>";
        return true;
    } else {
        echo "Error creating database: " . $conn->error;
        return false;
    }
}

function createTables($conn) {
    $sqlUsers = "CREATE TABLE IF NOT EXISTS Users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        email VARCHAR(100),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $sqlStudent = "CREATE TABLE IF NOT EXISTS Student (
        StudentID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        FirstName VARCHAR(255) NOT NULL,
        LastName VARCHAR(255) NOT NULL,
        DateOfBirth DATE,
        Email VARCHAR(255),
        Phone VARCHAR(20),
        Course VARCHAR(255),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $sqlInstructor = "CREATE TABLE IF NOT EXISTS Instructor (
        instructor_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        FirstName VARCHAR(255) NOT NULL,
        LastName VARCHAR(255) NOT NULL,
        DateOfBirth DATE,
        Email VARCHAR(255),
        Phone VARCHAR(20),
        degree VARCHAR(100),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $sqlCourse = "CREATE TABLE IF NOT EXISTS Course (
        course_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        course_name VARCHAR(50) NOT NULL,
        course_desc VARCHAR(50) NOT NULL,
        course_units INT(1) NOT NULL,
        instructor_id INT UNSIGNED,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (instructor_id) REFERENCES Instructor(instructor_id)
    )";

    $sqlEnrollment = "CREATE TABLE IF NOT EXISTS Enrollment (
        enrollment_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        student_id INT UNSIGNED,
        course_id INT UNSIGNED,
        instructor_id INT UNSIGNED,
        enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (student_id) REFERENCES Student(StudentID),
        FOREIGN KEY (course_id) REFERENCES Course(course_id),
        FOREIGN KEY (instructor_id) REFERENCES Instructor(instructor_id)
    )";

    $sqlQueries = [$sqlUsers, $sqlStudent, $sqlInstructor, $sqlCourse, $sqlEnrollment];
    
    foreach ($sqlQueries as $sql) {
        if ($conn->query($sql) !== TRUE) {
            echo "Error creating table: " . $conn->error;
            return false;
        }
    }
    return true;
}

// ... (previous code remains unchanged)

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
if (createDatabase($conn)) {
    echo "Database created successfully<br>";
    
    // Select the newly created database
    $conn->select_db("Cagas");

    // Check for table creation
    if (createTables($conn)) {
        echo "All tables created successfully";
    } else {
        echo "Tables creation failed";
    }
} else {
    echo "Database creation failed";
}

// Close connection
$conn->close();

?>
