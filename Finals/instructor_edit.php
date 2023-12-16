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
                        <h4>Instructor Edit 
                            <a href="Instructor.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $instructor_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM Instructor WHERE instructor_id ='$instructor_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $instructor = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="instructor_id" value="<?= $instructor['instructor_id']; ?>">

                                    <div class="mb-3">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" value="<?= $instructor['FirstName']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" value="<?= $instructor['LastName']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?= $instructor['Email']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Phone</label>
                                        <input type="text" name="phone" value="<?= $instructor['Phone']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="expertiseSelect" class="form-label">Expertise</label>
                                        <select name="course_index" onchange="ReloadCourseIndex();">
                                        <option value="<?= $instructor['degree']; ?>">Select Expertise</option>
                                        <?php
                                            $degree_map = array(
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
                                            );

                                            foreach ($degree_map as $value => $degree) {
                                                $selected = ($instructor['degree'] == $degree) ? 'selected' : '';
                                                echo "<option value=\"$value\" $selected>$degree</option>";
                                            }                                            
                                                                                        
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_instructor" class="btn btn-primary">
                                            Update Instructor
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
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
