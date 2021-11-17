<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <?php
    include('connection.php');
    if(isset($_POST['submit'])){
        $Gradeid = $_POST['gradeid'];
        $Studentid = $_POST['studentid'];
    }

    ?>
    <form action="" method="POST">
        <input type="hidden" name="gradeid" value="<?php echo $Gradeid;?>">
        <input type="hidden" name="studentid" value="<?php echo $Studentid;?>">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>

<?php
include('connection.php');
if(isset($_POST['submit'])){
    $Studentid = $_POST['studentid'];
    $Gradeid = $_POST['gradeid'];
    $Date = date_default_timezone_set('Asia/Manila');
    $Date = date('Y-m-d H:i:s');

    $Query = "INSERT INTO studentgrades (Students_ID, Grades_ID,DateTimeCreated) VALUES ('$Studentid', '$Gradeid','$Date')";
    if($Sql = mysqli_query($conn, $Query)){
    }else{
        echo "error".$Sql."<br>".$conn->error;

    }
}
?>






?>

<form action="" method="POST">
<input type="text" name="grade" >
<input type="submit" name="grades">


</form>


<?php 
 $remark = "";
if(isset($_POST['grades'])){
    $Grades = $_POST['grade'];
  

    if($Grades <= "99"  &&  $Grades >= "75"){
        $remark = "Passed";
    }else{
        $remark ="Failed";
    }

}
?>
<input type="text" name="remark" value="<?php echo $remark?>">
