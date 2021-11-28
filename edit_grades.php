<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit_grades.css">
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
                <div class="container">
                    <div class="title">Edit Grades</div>
                <form action="update_grades.php" method="GET">
                    <input type="hidden" name="gradesid" value="<?php echo $Results['id'];?>">
                    <input type="hidden" name="profid" value="<?php echo $profid?>">
                    <input type="hidden" name="studentid" value="<?php echo $Results['ID'];?>">
                    <div class="user-details">
                    <div class="input-box">
                    <span class="details">Student's Name 
                    <input type="text" name="studentsname" readonly value="<?php echo $Results['Student']?>">
                    <br>
                    </div>
                    <div class="input-box">
                    <span class="details">Students Grade</span>
                    <input type="text" name="editgrades" value="<?php echo $Results['Grades'];?>">
                    <br>
                    </div>
                    <div class="input-box">
                    <span class="details">Subjects</span>
                    <?php
                    include('connection.php');
                    $SelectSub ="SELECT * FROM subjects";
                    $sql = mysqli_query($conn,$SelectSub);
                    if(mysqli_num_rows($sql)> 0 ) {?>
                    <select name="editsubject" class="dropdown">
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
                    </div>        
                    <div class="input-box">
                            <span class="details">Term</span>
                    <select name="editterm" class="dropdown">
                    <option value="Prelims"<?php if ($Results['Term'] === 'Prelims') echo ' selected="selected"'?>>Prelims</option>
                    <option value="Midterm"<?php if ($Results['Term'] === 'Midterm') echo ' selected="selected"'?>>Midterm</option>
                    <option value="Finals"<?php if ($Results['Term'] === 'Finals') echo ' selected="selected"'?>>Finals</option>
                    </select>
                    <br>
                    </div>       
                    <div class="input-box">
                            <span class="details">Remarks</span>
                    <input type="text" name="editremark" value="<?php echo $Results['Remarks']?>">
                    <br>
                    </div>
                        <div class="button">
                    <input class="update-btn" type="submit" name="update" value="Update Grades">
                    </div>
                    <div class="wrapper">
<div class="link_wrapper">
<a href="prof_dashboard.php">Dashboard</a>
<div class="icon">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
<path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z"/>
</svg>
</div>
</div>
</div>
                </form>
                
                            </div>
                            </div>
                            
                <?php
            }
        }


    }

    ?>
    
</body>
</html>