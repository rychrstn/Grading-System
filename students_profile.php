<?php
session_start();
if(!isset($_SESSION['username'], $_SESSION['id'], $_SESSION['studentid'])){
    header("location:student_login.php?action=login");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/students_profile.css">
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <title>Student's Profile</title>
</head>

    <?php
    include('connection.php');
    $Selectstudents = " SELECT a.ID, a.StudentID,a.YearAndCourse, concat(a.Firstname, ' ', a.Middlename, ' ', a.Lastname) as Student, a.Username,a.Password,a.ContactNumber,a.StudentStatus,a.DateTimeUpdated FROM students AS a WHERE ID = '".$_SESSION['id']."'";
    $Sql = mysqli_query($conn, $Selectstudents);
    if(mysqli_num_rows($Sql) > 0 ) { 
        foreach($Sql AS $Rows){
            ?>
<body class="bg-light"> 
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-5 pt-5">
                <div class="row z-depth-3">
                    <div class="col-sm-4 bg-info rounded-left">
                        <div class="card-block text-center text-white">
                            <i class="far fa-user-circle fa-7x mt-5"></i>
                            <h2 class="font-weight-bold mt-4"><td><?php echo $Rows['Student'];?></td></h2>
                            <p>Student</p>
                            <form action="edit_details.php" method="GET">
                            <input type="hidden" name="edit_detail" value="<?php echo $Rows['ID']?>">
                            <input type="submit" name="edit" value="Edit Profile">
                        </form>
                        </div>
                    </div>
                    <div class="col-sm-8 bg-white rounded-right">
                        <h3 class="mt-3 text-center">Information</h3>
                        <hr class="badge-success mt-0 w-25" style="position: absolute; left: 38%">
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Student ID</p>
                                <h6 class="text-muted"><td><?php echo $Rows['StudentID'];?></td></h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Username</p>
                                <h6 class="text-muted"><td><?php echo $Rows['Username'];?></td></h6>
                            </div>
                        </div>
                        <h3 class="mt-3"></h3>
                        <hr class="bg-success">
                        <div class="row">
                        <div class="col-sm-6">
                                <p class="font-weight-bold">Year And Course</p>
                                <h6 class="text-muted"><td><?php echo $Rows['YearAndCourse']?></td></h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Contact Number</p>
                                <h6 class="text-muted"><td><td><?php echo $Rows['ContactNumber']?></td></h6>
                            </div>
                        </div>
                        <h3 class="mt-3"></h3>
                        <hr class="bg-success">
                        <div class="row">
                        <div class="col-sm-6">
                                <p class="font-weight-bold">Student Status</p>
                                <h6 class="text-muted"><td><?php echo $Rows['StudentStatus'];?></td></h6>
                                <div class="wrapper">
                                <div class="link_wrapper">
                                <a href="index.php">Dashboard</a>
                                <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
                                <path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z"/>
                                </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <?php

        }
    }

    ?>

    
</body>
</html>
