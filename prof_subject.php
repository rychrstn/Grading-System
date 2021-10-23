<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require('connection.php');
    if(isset($_POST['subject'])){
        $Prof_id = $_POST['subjectid'];
        $SelectProf = "SELECT * FROM `professor` WHERE `id` = '$Prof_id'";
        $Sql = mysqli_query($conn, $SelectProf);
        foreach($Sql as $Result){
            ?>

       <form action="" method="POST">
            <input type="hidden" name="prof_id" value="<?php echo $Prof_id?>">
                <label>Subject Code</label>
                <input type="text" name="subjectcode">
                <br>
                <label>Subject Name </label>
                <input type="text" name="subjectname">
                <br>
                <label>Unit</label>
                <input type="number" name="unit">
                <br>

                <input type="submit" name="register" value="register">

            </form>
            <?php
        }
    }
    ?>

</body>
</html>
<?php
require('connection.php');
if(isset($_POST['register'])){
    $Prof_id = $_POST['prof_id'];
    $SubjectCode = $_POST['subjectcode'];
    $SubjectName = $_POST['subjectname'];
    $Unit = $_POST['unit'];
    $Date = date_default_timezone_set('Asia/Manila');
    $Date = date('Y-m-d H:i:s');

    $Query = "INSERT INTO subjects(Prof_id, SubjectCode, SubjectName, Unit, DateTimeCreated) VALUES ('$Prof_id', '$SubjectCode', '$SubjectName', '$Unit', '$Date')";
    if($Sql = mysqli_query($conn, $Query)){
        header('Location:prof_records.php');

    }else{
        echo "error";
    }

}
?>
