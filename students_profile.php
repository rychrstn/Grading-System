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
<body> 
<table class="profile">
                <thead>
                    <th>Student ID </th>
                    <th>Student's Name</th>
                    <th>Username</th>
                    <th>Year And Course</th>
                    <th>Contact Number </th>
                    <th> Student Status</th>
                </thead>
                <tbody>
                    <td><?php echo $Rows['StudentID'];?></td>
                    <td><?php echo $Rows['Student'];?></td>
                    <td><?php echo $Rows['Username'];?></td>
                    <td><?php echo $Rows['YearAndCourse']?></td>
                    <td><?php echo $Rows['ContactNumber']?></td>
                    <td><?php echo $Rows['StudentStatus'];?></td>
                    <td>
                        <form action="edit_details.php" method="GET">
                            <input type="hidden" name="edit_detail" value="<?php echo $Rows['ID']?>">
                            <input type="submit" name="edit" value="Edit Profile">
                        </form>
                    </td>
                </tbody>
            </table>

            
            


            <?php

        }
    }

    ?>

    
</body>
</html>
