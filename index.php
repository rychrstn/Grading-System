<?php
session_start();
if(!isset($_SESSION['username'], $_SESSION['id'], $_SESSION['studentid'], $_SESSION['valid'])){
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
    <script type = "text/javascript" src="app.js"></script>
    <title>Student Dashboard</title>
</head>
<body>

    <a href="logout.php" class="logout">Log out</a>
    <a href="students_profile.php"><span><i class="far fa-user-circle"></i></span></a>
    <div class="title">
    <h2>The University of Manila</h2>
    </div>
    <div class = "download">
    <i class="fas fa-download"></i>
    </div>
    <div id="user-icon">
    <span id="user-hover"><?php echo  $_SESSION['username'];?> </span>
    <br>
    </div>
    <div>
    <img class="um_logo" src="images/um.jpeg" alt="umlogo" height="100" width="120">
    </div>
    <div class = "year">
        <p>1st Semester SY: 2021-2022</p>
    </div>
    <div class="info">
            <p><?php echo  $_SESSION['username'] . "<br>" . "\t". $_SESSION['fullname']?></p> <!--Fetch Year and Course-->
    </div>

    <table>
    <table class="table-contents">
        <thead>
            <tr>
                <th>Professor Name</th>
                <th>Subject</th>
                <th>Term</th>
                <th>Grade</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('connection.php');
            $SelectStudent = "SELECT a.StudentID,a.YearAndCourse, concat(a.Firstname, ' ', a.Middlename, ' ', a.Lastname) as Student,b.Grades,b.Remarks, b.Term,c.SubjectCode, c.SubjectName,concat(d.Firstname, ' ', d.Middlename, ' ', d.Lastname) as Professor FROM students AS a JOIN grades AS b ON b.Student_ID = a.ID JOIN subjects c ON c.id = b.Subject_ID JOIN professor AS d ON d.id = b.Prof_ID

            WHERE b.Student_ID= '".$_SESSION['id']."'";
             $Run = mysqli_query($conn, $SelectStudent);
             while($Row = mysqli_fetch_assoc($Run)){
            ?>
            <tr>
                <td><?php echo $Row['Professor'];?></td>
                <td><?php echo $Row['SubjectCode'];?></td>
                <td><?php echo $Row['Term']?></td>
                <td><?php echo $Row['Grades'];?></td>
                <td><?php echo $Row['Remarks']?></td>
            </tr>
            <?php
             }
            

            ?>
        </tbody>
    </table>
</body>
</html>