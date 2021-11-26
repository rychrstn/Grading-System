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
        type="password" name="password" placeholder="Password" required>
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
        <div class="wrapper">
<div class="link_wrapper">
<a href="students_records.php">Dashboard</a>
<div class="icon">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
<path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z"/>
</svg>
</div>
</div>
</div>
    </form>

    <script type="text/javascript">
    // Callback
    window.onbeforeunload = function(e) {
        // Turning off the event
        e.preventDefault();
    }
</script>
    
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
        $hash = password_hash($Password, PASSWORD_BCRYPT);
        $Firstname = $_POST['firstname'];
        $Middlename = $_POST['middlename'];
        $Lastname = $_POST['lastname'];
        $Year = $_POST['year'];

        $Query = "INSERT INTO `professor`(Username,Password,Firstname,Middlename,Lastname,Year,DateTimeCreated) VALUES ('$Username','$hash','$Firstname','$Middlename','$Lastname','$Year','$Date')";
        if($sql = mysqli_query($conn,$Query)){
            echo "<script>alert('Record inserted');</script>";

        }else{
            echo "record not inserted";
            return $sql;
        }

    }
}

?>