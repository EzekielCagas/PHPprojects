<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Information System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ms-3">
        <a class="navbar-brand" href="#">School Information System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Enrollment.php">Enrollment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Student.php">Student Record</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Course.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Instructor.php">Instructors</a>
                </li>
            </ul>
        </div>
    </nav>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Course 
                            <a href="Course.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Course Name</label>
                                <input type="text" name="course_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Course Description</label>
                                <input type="text" name="course_desc" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Total Units</label>
                                <input type="number" name="course_units" class="form-control">
                            </div>
                             <div class="mb-3">
                            <label for="instructor_id">Instructor ID</label>
                            <select class="form-control" name="instructor_id">
                                <?php
                                    $db = new mysqli("localhost", "root", "", "Cagas");

                                    if ($db->connect_error) {
                                        die("Connection failed: " . $db->connect_error);
                                    }

                                    $result = $db->query("SELECT instructor_id, LastName, FirstName FROM Instructor");

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row["instructor_id"] . "'>" . $row["LastName"] . ", " . $row["FirstName"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                </div>
                            <div class="mb-3">
                                <button type="submit" name="save_course" class="btn btn-primary">Save Course</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
