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
    <div class="box">
    <div class="wrapper">
<div class="link_wrapper">
<a href="students_records.php">Dashboard</a>
<div class="icon">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
<path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z"/>
</svg>
</div>
</div>
</div>
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