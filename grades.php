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
    if(isset($_GET['grades'])){
       $_SESSION['id'];
    }?>
    <table>
        <thead>
            <tr>
                <th>Student's Name</th>
                <th>StudentID</th>
                <th>Subject</th>
                <th>Term</th>
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
        
    if($Grades <= "99"  &&  $Grades >= "75"){
        $Remark = "Passed";
    }else{
        $Remark ="Failed";
    }

    $Sql_grades = "SELECT * FROM grades WHERE Grades = '$Grades'";
    $Sql_subjectid = "SELECT *FROM grades WHERE Subject_ID = '$Subjectid'";
    $Sql_term = "SELECT * FROM grades WHERE Term = '$Term'";
    $Res_grades = mysqli_query($conn, $Sql_grades);
    $Res_subjectid = mysqli_query($conn , $Sql_subjectid);
    $Res_Term = mysqli_query($conn, $Sql_term);


    if(mysqli_num_rows($Res_grades) > 0 ) {
        echo "You already Graded the student";
    }else if (mysqli_num_rows($Res_subjectid)> 0 ) {
        echo "This subjects is already graded";

    }else if (mysqli_num_rows($Res_Term)> 0 ) { 
        echo "This term is already graded";
    }else{
        $Insert = "INSERT INTO grades(Prof_ID, Subject_ID, Student_ID, Grades, Term, Remarks, DateTimeCreated) VALUES ('$Profid','$Subjectid','$Studentid','$Grades', '$Term','$Remark','$Date')";
        if($create = mysqli_query($conn, $Insert)){
            echo "<script>alert('successfully graded')</script>";
            header('Location:prof_dashboard.php');
        }else{
            echo "error";
        }
    
    }
}

    ?>

    

    
        
        


