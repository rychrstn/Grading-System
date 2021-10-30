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
        <thead>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Lastname</th>
            </tr>
            <tbody>
            <?php
            include('connection.php');
            $Select = "SELECT * FROM students";
            $Sql = mysqli_query($conn, $Select);
            if($Row = mysqli_num_rows($Sql)> 0 ){
                while($Row = mysqli_fetch_array($Sql)){

                    ?>
                    <tr>
                        <td><?php echo $Row['ID'];?></td>
                        <td><?php echo $Row['Firstname'];?></td>
                        <td><?php echo $Row['Middlename'];?></td>
                        <td><?php echo $Row['Lastname'];?></td>
                        <td> 
                            <form action="insert_grades.php" method="POST">
                                <input type="submit" name="submit" value="submit">
                            </form>
                    
                </tr>
            </tbody>
            <?php
                }
            }


            ?>
        </thead>
    </table>
    
    <?php
    session_start();
    include('connection.php');
    if(isset($_POST['grades'])){
        $Prof_id = $_SESSION['id'];
        $SelectStudent = "SELECT * FROM professor WHERE id = '$Prof_id'";
        $Sql = mysqli_query($conn, $SelectStudent);
        if($Rows = mysqli_num_rows($Sql) > 0 ){
            while($Rows = mysqli_fetch_array($Sql)){
                ?>
                <input type="hidden" name="student" value="<?php echo $Studentid;?>">
<?php
            }
            ?>
            <form action="" method="POST">
                <label> Select Term </label>
            <select class="term" name="terms">
                    <option selected disabled>Select term </option>
                    <option value="prelims">Prelims</option>
                    <option value="midterms">Midterms</option>
                    <option value="finals">Finals</option>
                    <br>
                </select>
                <br>
                <label> Grades:</label>
                <input type="text" name="grades">
                <br>
                <label> Remarks </label>
                <input type="text" name="remarks">
                <br>
                <?php

                include('connection.php');
                $SelectSub = "SELECT * FROM subjects WHERE Prof_id  ='".$_SESSION['id']."'";
                $Run = mysqli_query($conn, $SelectSub);
                if($Row = mysqli_num_rows($Run)> 0 ){
    ?>
    <select name="subject">
        <option selected disabled> Select Subject</option>
        <?php while($Row = mysqli_fetch_array($Run)){ ?>

            <option value="<?php echo $Row['id'];?>"><?php echo $Row['SubjectCode'];?></option>
            
            <?php
        }
        ?>
    </select>
    <br>
<?php
}
?>

<input type="submit" name="submit" value="submit grades">
            
            </form>


            <?php
        }
    }
?>
    
<!-- student side -->
         
                
        </tbody>
    </table>
    </form>
</body>
</html>
<?php
include('connection.php');
if(isset($_POST['submit'])){
    $Prof_id = $_SESSION['id'];
    // $Studentid = $_POST['student_id'];
    $Subjects = $_POST['subject'];
    $Terms = $_POST['terms'];
    $Grades = $_POST['grades'];
    $Remarks = $_POST['remarks'];
    $Date = date_default_timezone_set('Asia/Manila');
    $Date = date('Y-m-d H:i:s');

    $Query = "INSERT INTO grades (Prof_ID, Subject_ID, Grades, Term, Remarks, DateTimeCreated) VALUES ('$Prof_id','$Subjects', '$Grades', '$Terms', '$Remarks', '$Date')";
    if($Sql = mysqli_query($conn, $Query)){
    }else{
        echo "error".$Sql."<br>".$conn->error;

    }
}
            
        
    
?>


