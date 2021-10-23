<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <label> Username</label>
    <input type="text" name="username" placeholder="Enter Password">
    <br>
    <label> Password </label>
    <input type="password" name="password" placeholder="Enter Passsword">
    <br>
    <input type="submit" name="login" value="Login">
    </form>
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
        $_SESSION['firstname'] = $row['Firstname'];
        $_SESSION['middlename'] = $row['Middlename'];
        $_SESSION['lastname'] = $row['Lastname'];
        $_SESSION['year'] = $row['Year'];
        $_SESSION['id'] = $row['id'];
        if(!password_verify($Password, $row['Password'])){
            echo "Incorrect Password";
        }else{
            header('Location:prof_dashboard.php');
        }
}else{
    echo "No account existing";
}
}
?>