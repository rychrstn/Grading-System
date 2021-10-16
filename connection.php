<?php

$conn =  new mysqli('localhost:', 'root','','onlinegradingsystem');

if(mysqli_connect_errno()){
    echo "Failed to connect to mysql:". mysqli_connect_errno();
    exit();
    
}


?>