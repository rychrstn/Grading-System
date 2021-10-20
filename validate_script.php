<?php
include('connection.php');
    if(isset($_POST['validate'])){
        $id = $_POST['edit_id'];
        $Validate = $_POST['valid'];

        $Valid = "UPDATE `students` SET `Valid` = '$Validate' WHERE `ID` = '$id'";
        if($Sql = mysqli_query($conn,$Valid)){
            header('Location:students_records.php');

    }else{
        echo "ERROR.";
    }
}
    ?>