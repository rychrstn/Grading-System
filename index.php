<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:student_login.php?action=login");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Hello <?php echo  $_SESSION['username'];?></p>
</body>
</html>