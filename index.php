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
    <script src="https://kit.fontawesome.com/d29cb4cf2b.js" crossorigin="anonymous"></script>   
    <link rel="stylesheet" href="css/studentdashboard.css">
    <title>Document</title>
</head>
<body>
    <form action="students_grades.php" method="GET">
        <input type="submit" name="showgrade" value="Show Grade"> 
    </form>
    <a href="logout.php" class="logout">Log out</a>

    <div class="title">
    <h2>The University of Manila</h2>
    </div>
    <div class = "download">
    <i class="fas fa-download"></i>
    </div>
    <div class="student-icon"><i class="far fa-user-circle"></i></div>
    <div>
    <img class="um_logo" src="images/um.jpeg" alt="umlogo" height="100" width="120">
    </div>
    <div class = "year">
        <p>1st Semester SY: 2021-2022</p>
    </div>
    <div class="info">
            <p><?php echo  $_SESSION['username'];?></p> <!--Fetch Year and Course-->
    </div>
    <form action="" method="POST">
        <input type="submit" name="students" value="show grade">
    </form>
    
    
</body>
</html>