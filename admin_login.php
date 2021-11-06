<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d29cb4cf2b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin</title>
</head>
<body>
<section>
    <div class="box"></div>
        </section>
    
    <div class="textboxdiv">
    <div class="title"><h1>The Univerity of Manila</h1>
    <img class="um_logo" src="images/um.jpeg" alt="umlogo" height="120" width="140"></a>
    </div>
    <i class="fas fa-users-cog"></i>
    <br>
    <p style="position: fixed; padding-left: 640px; padding-top: 25px; font-weight: bold;">Welcome Admin</p>
    <br>
    <br>
    <br>
    <div>
    <form action="" method="POST">
        <input style="border: 2px solid lightgreen; font-size: 20px"
        type="text" name="username" placeholder="Username">
        <br>
        <br>
        <input style="border: 2px solid lightgreen; font-size: 20px"
         type = "password" name="password" placeholder="Password">
        <br>
        <br>
        <br>
        <input class="btnlogin" style="width: 100px; height: 50px; color: white; background-color:black; font-size: 20px;" type="submit" name="login" value="Login">
        </div>
    </div>
    </form>








    <!--<form action="" method="POST">
        <label>Username</label>
        <input type="text" name="username" placeholder="Enter Username">
        <br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter Password">
        <br>
        <input type="submit" name="login" value="Login">
    </form>-->

</body>
</html>
<?php
session_start();
include('connection.php');
 if(isset($_POST['login'])){
    $Username = mysqli_real_escape_string($conn,$_POST['username']);
    $Password = mysqli_real_escape_string($conn,$_POST['password']);

    if(empty($Username) || empty($Password)){
        echo "<script>alert('empty input field');</script>";

    }else{
        $Query = "SELECT * FROM `admin` WHERE `Username` = '$Username' AND `Password` = '$Password'";
        $sql = mysqli_query($conn,$Query);
        if(mysqli_num_rows($sql)> 0 ){
            header('Location:admin_dashboard.php');
        }else{
            echo "Not hello";

        }
    }
}

?>
