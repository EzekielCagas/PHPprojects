<?php
session_start();
require 'dbcon.php';

// Define a map of option values to corresponding degree names
$degree_map = [
    '163' => 'Bachelor of Science in Computer Science',
    '353' => 'Bachelor of Multimedia Arts',
    '65' => 'Bachelor of Science in Computer Engineering',
    '69' => 'Bachelor of Science in Computer Science',
    '153' => 'Bachelor of Science in Data Analytics',
    '64' => 'Bachelor of Science in Electronic and Communications Engineering',
    '101' => 'Bachelor of Science in Electronics Engineering',
    '247' => 'Bachelor of Science in Industrial Security Management',
    '122' => 'Bachelor of Science in Information & Computer Science',
    '123' => 'Bachelor of Science in Information Management',
    '72' => 'Bachelor of Science in Information Systems',
    '70' => 'Bachelor of Science in Information Technology',
    '110' => 'Default Course',
    '127' => 'Default Course CITCS',
    '268' => 'Bachelor of Science in Computer Science',
    '269' => 'Bachelor of Science in Computer Science',
    '270' => 'Bachelor of Science in Information & Computer Science',
    '304' => 'Bachelor of Science in Information Systems',
    '305' => 'Bachelor of Science in Information Technology',
];

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM Student WHERE StudentID='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: Student.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: Student.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $fname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $expertise = mysqli_real_escape_string($con, $_POST['expertise']);
    $selected_option = $_POST['course_index']; // Assuming 'course_index' is the name of your dropdown

    // Set a default degree value
    $degree_value = 'Default Degree';

    // Check if the selected option exists in the map
    if (isset($degree_map[$selected_option])) {
        // Assign the degree value based on the selected option
        $degree_value = $degree_map[$selected_option];
    }

    $query = "UPDATE Student SET FirstName='$fname', LastName='$lname', Email='$email', Phone='$phone', Course='$course' WHERE StudentID='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: Student.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: Student.php");
        exit(0);
    }
}

if(isset($_POST['save_student']))
{
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $selected_option = $_POST['course_index']; // Assuming 'course_index' is the name of your dropdown

    // Set a default degree value
    $degree_value = 'Default Degree';

    // Check if the selected option exists in the map
    if (isset($degree_map[$selected_option])) {
        // Assign the degree value based on the selected option
        $degree_value = $degree_map[$selected_option];
    }

    $query = "INSERT INTO Student (FirstName, LastName, DateOfBirth, Email, Phone, Course) VALUES ('$firstname', '$lastname', '$dob', '$email', '$phone', '$degree_value')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: Student.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: Student.php");
        exit(0);
    }
}

if(isset($_POST['save_instructor']))
{
    $instructor_fname = mysqli_real_escape_string($con, $_POST['instructor_fname']);
    $instructor_lname = mysqli_real_escape_string($con, $_POST['instructor_lname']);
    $instructor_dob = mysqli_real_escape_string($con, $_POST['instructor_dob']);
    $instructor_email = mysqli_real_escape_string($con, $_POST['instructor_email']);
    $instructor_phone = mysqli_real_escape_string($con, $_POST['instructor_phone']);
    $selected_option = $_POST['course_index']; // Assuming 'course_index' is the name of your dropdown

    // Set a default degree value
    $degree_value = 'Default Degree';

    // Check if the selected option exists in the map
    if (isset($degree_map[$selected_option])) {
        // Assign the degree value based on the selected option
        $degree_value = $degree_map[$selected_option];
    }

    $query = "INSERT INTO Instructor (FirstName, LastName, DateOfBirth, Email, Phone, degree) VALUES ('$instructor_fname', '$instructor_lname', '$instructor_dob', '$instructor_email', '$instructor_phone', '$degree_value')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Instructor Created Successfully";
        header("Location: Instructor.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Instructor Not Created";
        header("Location: Instructor.php");
        exit(0);
    }
}

if(isset($_POST['save_course']))
{
    $course_name = mysqli_real_escape_string($con, $_POST['course_name']);
    $course_desc = mysqli_real_escape_string($con, $_POST['course_desc']);
    $course_units = mysqli_real_escape_string($con, $_POST['course_units']);
    $instructor_id = mysqli_real_escape_string($con, $_POST['instructor_id']);

    $query = "INSERT INTO Course (course_name, course_desc, course_units, instructor_id) VALUES ('$course_name', '$course_desc', '$course_units', $instructor_id)";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Course Created Successfully";
        header("Location: Course.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Course Not Created";
        header("Location: Course.php");
        exit(0);
    }
}
if(isset($_POST['delete_instructor']))
{
    $instructor_id = mysqli_real_escape_string($con, $_POST['delete_instructor']);

    $query = "DELETE FROM Instructor WHERE instructor_id='$instructor_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Instructor Deleted Successfully";
        header("Location: Instructor.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Instructor Not Deleted";
        header("Location: Instructor.php");
        exit(0);
    }
}
if(isset($_POST['update_instructor']))
{
    $instructor_id = mysqli_real_escape_string($con, $_POST['instructor_id']);

    $fname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $expertise = mysqli_real_escape_string($con, $_POST['expertise']);
    $selected_option = $_POST['course_index']; // Assuming 'course_index' is the name of your dropdown

    // Set a default degree value
    $degree_value = 'Default Degree';

    // Check if the selected option exists in the map
    if (isset($degree_map[$selected_option])) {
        // Assign the degree value based on the selected option
        $degree_value = $degree_map[$selected_option];
    }

    $query = "UPDATE Instructor SET FirstName='$fname', LastName='$lname', Email='$email', Phone='$phone', degree= '$degree_value' WHERE instructor_id='$instructor_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Instructor Updated Successfully";
        header("Location: Instructor.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Instructor Not Updated";
        header("Location: Instructor.php");
        exit(0);
    }
}

if(isset($_POST['delete_course']))
{
    $courseID = mysqli_real_escape_string($con, $_POST['delete_course']);

    $query = "DELETE FROM Course WHERE course_id='$courseID'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Course Deleted Successfully";
        header("Location: Course.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Course Not Deleted";
        header("Location: Course.php");
        exit(0);
    }
}

if(isset($_POST['update_course']))
{
    $course_id = mysqli_real_escape_string($con, $_POST['course_id']);

    $course_name = mysqli_real_escape_string($con, $_POST['course_name']);
    $course_desc = mysqli_real_escape_string($con, $_POST['course_desc']);
    $course_units = mysqli_real_escape_string($con, $_POST['course_units']);
    $instructor_id = mysqli_real_escape_string($con, $_POST['instructor_id']);

    $query = "INSERT INTO Course (course_name, course_desc, course_units, instructor_id) VALUES ('$course_name', '$course_desc', '$course_units', $instructor_id)";
    $query = "UPDATE Course SET course_name='$course_name', course_desc='$course_desc', course_units='$course_units', instructor_id='$instructor_id' WHERE course_id='$course_id'";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Course Created Successfully";
        header("Location: Course.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Course Not Created";
        header("Location: Course.php");
        exit(0);
    }
}

if(isset($_POST['save_enrollment']))
{
    $student = mysqli_real_escape_string($con, $_POST['StudentID']);
    $course = mysqli_real_escape_string($con, $_POST['course_id']);
    $instructor = mysqli_real_escape_string($con, $_POST['instructor_id']);

    $query = "INSERT INTO Enrollment (student_id, course_id, instructor_id) VALUES ('$student', '$course', '$instructor')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Enrollement Created Successfully";
        header("Location: Enrollment.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Enrollement Not Created";
        header("Location: Enrollment.php");
        exit(0);
    }
}

?>
