<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/subjects.css">
    <title>Create Subjects</title>
</head>
<body>
    <?php include('admin_dashboard.php');?>
    <div class="box">
    <form action="" method="POST">
        <label class="form_label" for="subjectcode">Subject Code</label>
        <br>
        <input class="form_input" type="text" name="subjectcode" id="subjectcode">
        <br>
        <label class="form_label"  for="subjectname">Subject Name</label>
        <br>
        <input class="form_input" type="text" name="subjectname" id="subjectname">
        <br>
        <label class="form_label"  for="unit">Unit</label>
        <br>
        <input class="form_input" type="text" name="unit" id="unit">
        <br>
        <br>
        <input class="Create" type="submit" name="create" value="Create">
        <br>
    </form>
    </div>
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
        
        $SelectSub = "SELECT * FROM `subjects` WHERE SubjectCode = '$SubjectCode'";
        $SelectName = "SELECT * FROM `subjects` WHERE SubjectName = '$SubjectName'";
        $Res_Name = mysqli_query($conn , $SelectName);
        $Res_Sub = mysqli_query($conn , $SelectSub);
        if(mysqli_num_rows($Res_Sub) > 0 ) {
            echo "The Subject Code is already taken";
        }else if (mysqli_num_rows($Res_Name) > 0 ){
            echo "The Subject Name is already taken";
        }else{
            $Query = "INSERT INTO `subjects`(SubjectCode, SubjectName, Unit, DateTimeCreated) VALUES('$SubjectCode', '$SubjectName', '$Unit', '$Date')";
            if($sql = mysqli_query($conn, $Query)){
                echo"<script>alert('Subject created successfully');</script>";
            }else{
                echo "not insert".$sql ."<br>". $conn->error;
            }

        }
    }

?>