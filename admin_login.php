<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
</head>
<body>
    <form action="" method="POST">
        <label>Username</label>
        <input type="text" name="username" placeholder="Enter Username">
        <br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter Password">
        <br>
        <input type="submit" name="login" value="Login">
    </form>
    
</body>
</html>
<?php
 if(isset($_POST['login'])){
    $Username = mysqli_real_escape_string($conn,$_POST['username']);
    $Password = mysqli_real_escape_string($conn,$_POST['password']);

    if(empty($Username) || empty($Password)){
        echo "<script>alert('empty input field');</script>";

    }else{
        $Query = "SELECT * FROM admin Where Username = '$Username' And Password = '$Password'";
        $sql = mysqli_query($conn,$Query);

        if(mysqli_num_rows($sql)> 0 ){
            echo "Hello";
        }else{
            echo "Not hello".$sql."<br>".$conn->error;

        }
    }
}

?>
