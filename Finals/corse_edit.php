<?php
    require 'dbcon.php';
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
                        <h4>Course Edit 
                            <a href="Course.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $course_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM Course WHERE course_id='$course_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $course = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="course_id" value="<?= $course['course_id']; ?>">

                                    <div class="mb-3">
                                        <label>Course Name</label>
                                        <input type="text" name="course_name" value="<?= $course['course_name']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Course Description</label>
                                        <input type="text" name="course_desc" value="<?= $course['course_desc']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Total Units</label>
                                        <input type="number" name="course_units" value="<?= $course['course_units']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="instructor_id">Instructor</label>
                                        <select class="form-control" name="instructor_id">
                                            <?php
                                            $db = new mysqli("localhost", "root", "", "Cagas");

                                            if ($db->connect_error) {
                                                die("Connection failed: " . $db->connect_error);
                                            }

                                            $result = $db->query("SELECT instructor_id, LastName, FirstName FROM Instructor");

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $selected = ($row['instructor_id'] == $course['instructor_id']) ? 'selected' : '';
                                                    echo "<option value='" . $row['instructor_id'] . "' $selected>" . $row['LastName'] . ", " . $row['FirstName'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_course" class="btn btn-primary">
                                            Update Course
                                        </button>
                                    </div>
                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>Similar Id not Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
