<?php

?>

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
    session_start();
    include('connection.php');
    if(isset($_GET['update'])){
        $gradesid = $_GET['gradesid'];
        $profid = $_SESSION['id'];
        $Query = "SELECT a.ID, a.StudentID,a.YearAndCourse, concat(a.Firstname, ' ', a.Middlename, ' ', a.Lastname) as Student,b.Grades,b.Remarks, b.Term,b.id,c.SubjectCode,b.id,b.Subject_ID, c.SubjectName,concat(d.Firstname, ' ', d.Middlename, ' ', d.Lastname) as Professor FROM students AS a JOIN grades AS b ON b.Student_ID = a.ID JOIN subjects c ON c.id = b.Subject_ID JOIN professor AS d ON d.id = b.Prof_ID WHERE b.id = '$gradesid'";
        $Sql = mysqli_query($conn, $Query);
        if(mysqli_num_rows($Sql) > 0 ) {
            foreach($Sql as $Results){
               
             
                
                ?>
                <form action="update_grades.php" method="GET">
                    <input type="hidden" name="gradesid" value="<?php echo $Results['id'];?>">
                    <input type="hidden" name="profid" value="<?php echo $profid?>">
                    <input type="hidden" name="studentid" value="<?php echo $Results['ID'];?>">
                    <label>Student's Name </label>
                    <input type="text" name="studentsname" readonly value="<?php echo $Results['Student']?>">
                    <br>
                    <label>Students Grade</label>
                    <input type="text" name="editgrades" value="<?php echo $Results['Grades'];?>">
                    <br>
                    <label>Subjects</label>
                    <?php
                    include('connection.php');
                    $SelectSub ="SELECT * FROM subjects";
                    $sql = mysqli_query($conn,$SelectSub);
                    if(mysqli_num_rows($sql)> 0 ) {?>
                    <select name="editsubject">
                    <option value="<?php echo $Results['Subject_ID']?>"><?php echo $Results['SubjectCode']?></option>
                                        <?php while($row = mysqli_fetch_array($sql)){?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['SubjectCode'];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                <?php  
                                }
                                ?>
                    <br>
                    <label>Term</label>
                    <select name="editterm">
                    <option value="Prelims"<?php if ($Results['Term'] === 'Prelims') echo ' selected="selected"'?>>Prelims</option>
                    <option value="Midterm"<?php if ($Results['Term'] === 'Midterm') echo ' selected="selected"'?>>Midterm</option>
                    <option value="Finals"<?php if ($Results['Term'] === 'Finals') echo ' selected="selected"'?>>Finals</option>
                    </select>
                    <br>
                    <label>Remarks</label>
                    <input type="text" name="editremark" value="<?php echo $Results['Remarks']?>">
                    <br>
                    <input type="submit" name="update" value="Update Grades">
               

                </form>

                <?php
            }
        }


    }

    ?>
    
</body>
</html>