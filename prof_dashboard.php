<?php
session_start();
if(!isset($_SESSION['firstname']  , $_SESSION['middlename'] , $_SESSION['lastname'])){
    header("location:prof_login.php?action=login");

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
    <p> Prof: <?php echo  $_SESSION['firstname']. $_SESSION['middlename'] . $_SESSION['lastname'] ?></p>
    
</body>
</html>