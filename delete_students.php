<?php
include('connection.php');
if(isset($_GET['delete'])){
    $Deleteid = $_GET['delete_id'];

    $Delete = "DELETE FROM students WHERE ID = '$Deleteid'";
    $Query = mysqli_query($conn, $Delete);

    if($Query){
        echo"Grades Deleted";
        header('Location: student_records.php');
      
    }else{
        echo "User is not deleted";
        header('Location:student_records.php');
    }
}


?>