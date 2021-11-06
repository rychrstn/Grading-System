<?php

$conn =  new mysqli('localhost:3306', 'root','','onlinegradingsystem');

if(mysqli_connect_errno()){
    echo "Failed to connect to mysql:". mysqli_connect_errno();
    exit();
    
}


?>