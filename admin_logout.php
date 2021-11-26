<?php
session_start();

if(isset($_SESSION['username'])){
    session_destroy();
    header('Location: admin_login.php');
    header('Location:admin_login.php');
}


?>