<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Subjects</title>
</head>
<body>
    <form action="" method="POST">
        <label>Subject Code</label>
        <input type="text" name="subjectcode" id="">
        <br>
        <label for="">Subject Name</label>
        <input type="text" name="subjectname" id="">
        <br>
        <label for="">Unit</label>
        <input type="text" name="unit">
        <br>
        <input type="submit" name="create" value="Create">
    </form>
    
</body>
</html>

<?php
include ('connection.php');
    if(isset($_POST['create'])){
        $Date = date_default_timezone_set('Asia/Manila');
        $Date = date('Y-m-d H:i:s');
        $SubjectCode = $_POST['subjectcode'];
        $SubjectName = $_POST['subjectname'];
        $Unit = $_POST['unit'];

        $Query = "INSERT INTO `subjects`(SubjectCode, SubjectName,Unit,DateTimeCreated) Values('$SubjectCode','$SubjectName','$Unit','$Date')";
        if($sql = mysqli_query($conn,$Query)){
            echo"<script>alert('Subject created successfully');</script>";

        }else{
            echo "not insert".$sql ."<br>". $conn->error;
        }
    }

    

?>