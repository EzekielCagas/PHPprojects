<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <!-- Add Bootstrap or CSS links here -->
</head>
<body>
    <h2>Create New Student</h2>
    <form action="process_create_student.php" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>
        <br>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>
        <br>
        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob">
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address">
        <br>
        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number">
        <br>
        <button type="submit">Create Student</button>
    </form>
</body>
</html>