<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d29cb4cf2b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/prof_login.css">
    <title>Professor</title>
</head>
<body>
<section>
    <div class="box"></div>
        </section>
    <form action="" method="POST">
    <div class="textboxdiv">
    <div class="title"><h1>The University of Manila</h1>
    <img class="um_logo" src="images/um.jpeg" alt="umlogo" height="120" width="140"></a>
    </div>
    <i class="fas fa-user-tie"></i>
    <p style="position:fixed; margin-top: 40px; margin-left: 620px;">Welcome Professor!</p>
    <br>
    <br>
    <br>
    <br>
    <div>
        <input style="border: 2px solid lightgreen; font-size: 20px"
        type="text" name="username" id="Username" placeholder="Username">
        <br>
        <br>
        <input style="border: 2px solid lightgreen; font-size: 20px"
         type = "password" name="password" id="Password" placeholder="Password">
        <br>
        <br>
        <br>
        <input class="btnlogin" style="width: 100px; height: 50px; color: white; background-color:black; font-size: 20px;" type="submit" name="login" value="Login">
        </div>
    </div>
    <script>
        const Username = document.getElementById("Username")
        const Password = document.getElementById("Password")

        Username.value = sessionStorage.getItem('username')
        Password.value = sessionStorage.getItem("password")

        if(sessionStorage.getItem("autosave")){
            Username.value = sessionStorage.getItem("autosave");

        }
        if(sessionStorage.getItem("autosave2")){
            Password.value = sessionStorage.getItem("autosave2");
        }

        Username.addEventListener("change", function(){
            sessionStorage.setItem("autosave", Username.value);
        })
        Password.addEventListener("change", function(){
            sessionStorage.setItem("autosave2", Password.value);
        })

        sessionStorage.removeItem("autosave");
        sessionStorage.reomveItem("autosave2");
    </script>
    </form>





    <!--<form action="" method="POST">
    <label> Username</label>
    <input type="text" name="username" placeholder="Enter Password">
    <br>
    <label> Password </label>
    <input type="password" name="password" placeholder="Enter Passsword">
    <br>
    <input type="submit" name="login" value="Login">
    </form>-->
</body>
</html>
<?php
session_start();
include ('connection.php');
if(isset($_POST['login'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        echo "<script>alert('Both fields are empty')</script>";
        exit();
    }
    $Username = mysqli_real_escape_string($conn, $_POST['username']);
    $Password = mysqli_real_escape_string($conn, $_POST['password']);

    $Query = "SELECT * FROM `professor` WHERE Username = '$Username'";
    $Sql = $conn->query($Query);
    if($Sql->num_rows > 0 ){
        $row = mysqli_fetch_assoc($Sql);
        $_SESSION['username'] = $row['Username'];
        $_SESSION['firstname'] = $row['Firstname'];
        $_SESSION['middlename'] = $row['Middlename'];
        $_SESSION['lastname'] = $row['Lastname'];
        $_SESSION['year'] = $row['Year'];
        $_SESSION['id'] = $row['id'];
        if(!password_verify($Password, $row['Password'])){
            echo "<div class = FieldError1><p>Incorrect Password!</p></div>";
        }else{
            header('Location:prof_dashboard.php');
        }
}else{
    echo "<div class = FieldError2><p>Account do not Exist!</p></div>";
}
}
?>