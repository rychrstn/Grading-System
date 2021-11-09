<?php
include('connection.php');
if(isset($_GET['delete'])){
    $Deleteid = $_GET['gradesid'];

    $Delete = "DELETE FROM grades WHERE id = '$Deleteid'";
    $Query = mysqli_query($conn, $Delete);

    if($Query){
        echo"Grades Deleted";
        header('Location: prof_dashboard.php');
      
    }else{
        echo "User is not deleted";
        header('Location:prof_dashboard.php');
    }
}


?>