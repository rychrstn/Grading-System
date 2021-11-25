<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/grades.css">
    <title>Document</title>
</head>
<body>
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
    <?php 
    session_start();
    include('connection.php');
    if(isset($_GET['grades'])){
       $_SESSION['id'];
    }?>
    <table class="table-contents">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student's Name</th>
                <th>StudentID</th>
                <th>Year</th>
                <th>Subject</th>
                <th>Grade</th>
            </tr>
</thead>

            <tbody>
                
        <?php
        include('connection.php');
        $Select = "SELECT students.ID,students.StudentID,students.YearAndCourse, concat(students.Firstname, ' ', students.Middlename, ' ', students.Lastname) as Student FROM students";
        $Sql = mysqli_query($conn, $Select);
        if($Row = mysqli_num_rows($Sql)> 0 ){
            while($Row = mysqli_fetch_array($Sql)){?>

            <tr>
                <td><?php echo $Row['ID'];?></td>
                <td><?php echo $Row['Student']?></td>
                <td><?php echo $Row['StudentID'];?></td>
                <td><?php echo $Row['YearAndCourse'];?></td>
                <td>
                    <form action="" method="GET">
                    <input type="hidden" name="studentid" value="<?php echo $Row['ID']?>">
                    <?php
                    include('connection.php');
                    $SelectSub ="SELECT * FROM subjects";
                    $sql = mysqli_query($conn,$SelectSub);
                    if(mysqli_num_rows($sql)> 0 ) {?>
                    <select name="subject">
                    <option selected disabled>Select Subject</option>
                                        <?php while($row = mysqli_fetch_array($sql)){?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['SubjectCode'];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                <?php  
                                }
                                ?>
                                <td>
                                <input type="text" name="grades" >
                                <select name="term">
                                    <option selected disabled>Select term</option>
                                    <option value="Prelims">Prelims</option>
                                    <option value="Midterm">Midterm</option>
                                    <option value="Finals">Finals</option>
                                </select>
                                <?php $remark ?>
                                <input type="hidden" name="remark">
                                <input type="submit" name="grade" value="Submit">
                                </td>
                            </form>
                        </td>
    <?php
                }
            }
            ?></tr>
        </tbody>

        </table>
            
    </body>
    </html>
    <?php 
    error_reporting(0);
    $remark ="";
    include('connection.php');
    if(isset($_GET['grade'])){
    $Profid = $_SESSION['id'];
    $Studentid = $_GET['studentid'];
    $Grades = $_GET['grades'];
    $Subjectid = $_GET['subject'];
    $Term = $_GET['term'];
    $Remark =  $_GET['remark'];
    $Date = date_default_timezone_set('Asia/Manila');
    $Date = date('Y-m-d H:i:s');
    
    if(empty($Term) || empty($Grades) || empty($Subjectid)){
        echo"You did not input something";
        die();
    }
        
    if($Grades <= "99"  &&  $Grades >= "75"){
        $Remark = "Passed";
    }else{
        $Remark ="Failed";
        
    }
    $Sqlgrades = "SELECT * FROM `grades` WHERE Prof_ID = '$Profid' AND Subject_ID = '$Subjectid' AND Student_ID = '$Studentid' AND Grades = '$Grades' AND Term = '$Term'";
    $Sqlsubject = "SELECT * FROM `grades` WHERE  Subject_ID = '$Subjectid' AND Student_ID = '$Studentid' AND Term = '$Term' AND Grades = '$Grades'";
    $Res_subjects = mysqli_query($conn, $Sqlsubject);
    $Res_grades = mysqli_query($conn , $Sqlgrades);
    if(mysqli_num_rows($Res_grades) > 0 ) {
        echo "You've already graded the student";
    }elseif(mysqli_num_rows($Res_subjects) > 0 ){
        echo "You've already graded this subject";

    }else{
        $Insert = "INSERT INTO grades(Prof_ID, Subject_ID, Student_ID, Grades, Term, Remarks, DateTimeCreated) VALUES ('$Profid','$Subjectid','$Studentid','$Grades', '$Term','$Remark','$Date')";
        if($create = mysqli_query($conn, $Insert)){
            header('Location:prof_dashboard.php');
        }else{
            echo "error".$Sql."<br>".$conn->error;
        }
    
    }
}


    ?>

    

    
        
        


