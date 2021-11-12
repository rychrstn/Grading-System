<?php
include('connection.php');
if(isset($_GET['delete'])){
    $Deleteid = $_GET['prof_delete'];

    $Delete = "DELETE FROM professor WHERE id = '$Deleteid'";
    $Query = mysqli_query($conn, $Delete);

    if($Query){
        echo"Grades Deleted";
        header('Location: prof_records.php');
      
    }else{
        echo "User is not deleted";
        header('Location:prof_records.php');
    }
}


?>