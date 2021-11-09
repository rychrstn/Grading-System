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
    include('connection.php');
    if(isset($_GET['update'])){
        $Profid = $_GET['profid'];
        $gradesid = $_GET['gradesid'];
        $Studentid = $_GET['studentid'];
        $Grades = mysqli_real_escape_string($conn, $_GET['editgrades']);
        $Term = mysqli_real_escape_string($conn, $_GET['editterm']);
        $Subject = mysqli_real_escape_string($conn, $_GET['editsubject']);
        $Remark = "";
    if($Grades <= "99"  &&  $Grades >= "75"){
        $Remark = "Passed";
    }else{
        $Remark ="Failed";
        
    }

        $Query = "UPDATE `grades` SET `Prof_ID` = '$Profid', `Subject_ID` = '$Subject', `Student_ID` = '$Studentid ', `Grades` = '$Grades', `Term` = '$Term',`Remarks` = '$Remark' WHERE `id` = '$gradesid'";
        $Sql = mysqli_query($conn, $Query);
        if($Sql){
            echo "Grades Updated";
            header('location:prof_dashboard.php');
       


        }else{
            echo "error".$Sql."<br>".$conn->error;
        }


    }

    ?>
    
</body>
</html>