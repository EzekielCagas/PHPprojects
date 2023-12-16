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
                        <h4>Instructor Add 
                            <a href="Instructor.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>First Name</label>
                                <input type="text" name="instructor_fname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Last Name</label>
                                <input type="text" name="instructor_lname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Date of Birth</label>
                                <input type="date" name="instructor_dob" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="instructor_email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="instructor_phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="expertiseSelect" class="form-label">Expertise</label>
                                <select name="course_index" onchange="ReloadCourseIndex();">
                                <option value="">Select Expertise</option>
                    
                                    <option value="163">BACHELOR  OF SCIENCE IN COMPUTER SCIENCE</option>
                                    <option value="353">BACHELOR OF MULTIMEDIA ARTS</option>
                                    <option value="65">BACHELOR OF SCIENCE IN COMPUTER ENGINEERING</option>
                                    <option value="69">BACHELOR OF SCIENCE IN COMPUTER SCIENCE</option>
                                    <option value="153">BACHELOR OF SCIENCE IN DATA ANALYTICS</option>
                                    <option value="64">BACHELOR OF SCIENCE IN ELECTRONIC AND COMMUNICATIONS ENGINEERING</option>
                                    <option value="101">BACHELOR OF SCIENCE IN ELECTRONICS ENGINEERING</option>                                  
                                    <option value="247">BACHELOR OF SCIENCE IN INDUSTRIAL SECURITY MANAGEMENT</option>
                                    <option value="122">BACHELOR OF SCIENCE IN INFORMATION &amp; COMPUTER SCIENCE</option>
                                    <option value="123">BACHELOR OF SCIENCE IN INFORMATION MANAGEMENT</option>
                                    <option value="72">BACHELOR OF SCIENCE IN INFORMATION SYSTEMS</option>
                                    <option value="70">BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY</option>
                                    <option value="268">BACHELOR OF SCIENCE IN COMPUTER SCIENCE</option>
                                    <option value="269">BACHELOR OF SCIENCE IN COMPUTER SCIENCE </option>
                                    <option value="270">BACHELOR OF SCIENCE IN INFORMATION &amp; COMPUTER SCIENCE</option>
                                    <option value="304">BACHELOR OF SCIENCE IN INFORMATION SYSTEMS</option>
                                    <option value="305">BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY</option>
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_instructor" class="btn btn-primary">Save Instructor</button>
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
