<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profreg.css">
    <script src="https://kit.fontawesome.com/d29cb4cf2b.js" crossorigin="anonymous"></script>
    <title>Professor Register</title>
</head>
<body>
<section>
        <div class="box"></div>
        </section>
    <form action="" method="POST">
    <div class="textboxdiv">
    <div class="title"><p><b>Sign Up</b></p>
    </div>
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;" 
        type="text" name="username" placeholder="Username" required>
        <i class="fas fa-user-tie"></i>
        <br>
        
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="text" name="password" placeholder="Password" required>
        <i class="fas fa-lock"></i>
        <br>
        
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="text" name="firstname" placeholder="Firstname" required>
        <br>
        
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="text" name="middlename" placeholder="Middlename" required>
        <br>
        
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="text" name="lastname" placeholder="Lastname" required>
        <br>
        
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="text" name="year" placeholder="Year" required>
        <br>
        <input class="btnsignup" style="width: 250px; height: 50px; color: white; background-color:lightgreen; font-size: 20px;"
        type="submit" name="register" value="Sign up">
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