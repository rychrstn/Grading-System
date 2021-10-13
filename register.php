<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Register</title>
</head>
<body>
  
    <form action="" method="POST">
        <label> Username </label>
        <input type="text" name="username">
        <br>
        <label> Password </label>
        <input type="password" name="password">
        <br>
        <label>Student ID</label>
        <input type="number" name="id">
        <br>
        <label>Firstname</label>
        <input type="text" name="firstname">
        <br>
        <label>Middlename</label>
        <input type="text" name="middlename">
        <br>
        <label>Lastname</label>
        <input type="text" name="lastname">
        <br>
        <label>Year & Course</label>
        <input type="text" name="yearcourse">
        <br>
        <label>Contact Number</label>
        <input type="number" name="contacts">
        <br>
        <label>Student's Status </label>
        <select name="status">
            <option value="">--Select--</option>
            <option value="Regular">Regular Student</option>
            <option value="Irreguar"> Irregular Student</option>
        </select>
        <br>

        <input type="submit" name="insert" value="register">


    </form>
</body>
</html>
<?php
include 'connection.php';
    if(isset($_POST['insert'])){
        $Date = date_default_timezone_set('Asia/Manila');
        $Date = date('Y-m-d H:i:s');
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        $Password = password_hash($Password , PASSWORD_BCRYPT);
        $Studentid = $_POST['id'];
        $Firstname = $_POST['firstname'];
        $Middlename = $_POST['middlename'];
        $Lastname = $_POST['lastname'];
        $YearCourse = $_POST['yearcourse'];
        $Contacts = $_POST['contacts'];
        $Status = $_POST['status'];
        $bool = 1;
       

        $Query = "INSERT INTO `Students`(Username,Password,StudentID,FirstName,MiddleName,LastName,YearAndCourse,ContactNumber,StudentStatus,Valid,DateTimeCreated) VALUES ('$Username','$Password','$Studentid','$Firstname','$Middlename','$Lastname','$YearCourse','$Contacts','$Status','$bool','$Date')";
        if($sql = mysqli_query($conn,$Query)){
            echo"<script>alert('Record insert')</script>";
            
        }else{
            echo'not inserted';

        }

    }

?>