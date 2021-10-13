<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor Register</title>
</head>
<body>
    <form action="" method="POST">
        <label>Username</label>
        <input type="text" name="username" placeholder="Enter Username">
        <br>
        <label>Password</label>
        <input type="text" name="password" placeholder="Enter Password">
        <br>
        <label>Firstname</label>
        <input type="text" name="firstname" placeholder="Enter Firstname">
        <br>
        <label>Middlename</label>
        <input type="text" name="middlename" placeholder="Enter Middlename">
        <br>
        <label>Lastname</label>
        <input type="text" name="lastname" placeholder="Enter Lastname">
        <br>
        <label>Year</label>
        <input type="text" name="year" placeholder="Enter Year">
        <br>
        <input type="submit" name="register" value="register">
    </form>
    
</body>
</html>
<?php
include 'connection.php';
if(isset($_POST['register'])){
    if(isset($_POST['register'])){
        $Date = date_default_timezone_set('Asia/Manila');
        $Date = date('Y-m-d H:i:s');
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        $Firstname = $_POST['firstname'];
        $Middlename = $_POST['middlename'];
        $Lastname = $_POST['lastname'];
        $Year = $_POST['year'];

        $Query = "INSERT INTO `professor`(Username,Password,Firstname,Middlename,Lastname,Year,DateTimeCreated) VALUES ('$Username','$Password','$Firstname','$Middlename','$Lastname','$Year','$Date')";
        if($sql = mysqli_query($conn,$Query)){
            echo "<script>alert('Record inserted');</script>";

        }else{
            echo "record not inserted";
            return $sql;
        }

    }
}

?>