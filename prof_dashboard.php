<?php
include('connection.php');
session_start();
if(!isset($_SESSION['firstname']  , $_SESSION['middlename'] , $_SESSION['lastname'] , $_SESSION['year'], $_SESSION['id'], $_SESSION['username'])){
    header("location:prof_login.php?action=login");
    $_SESSION['id'] = $Profid;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d29cb4cf2b.js" crossorigin="anonymous"></script>   
    <link rel="stylesheet" href="css/prof_dashboard.css">
    <title>Professor Dashboard</title>
</head>
<body>
   <!-- sidebar -->
    <p> Prof: <?php echo  $_SESSION['firstname']. $_SESSION['middlename'] . $_SESSION['lastname'] ?></p>
    
    <!--<p> Prof: <?php echo  $_SESSION['firstname']. $_SESSION['middlename'] . $_SESSION['lastname'] ?></p>-->
    
    <h2><?php echo $_SESSION['firstname']   ."\t". $_SESSION['middlename'] . "\t" . $_SESSION['lastname'] ?></h2>
    <h2><?php echo $_SESSION['year'];?></h2>
    <h2><?php echo $_SESSION['id']?></h2>
    <i class="fas fa-user-tie"></i>
    <h2 class = "profname"><?php echo $_SESSION['firstname']   ."\t". $_SESSION['middlename'] . "\t" . $_SESSION['lastname'] ?></h2>
    <h2 class="year"><?php echo $_SESSION['year'];?></h2>
    <form action="grades.php" method="POST">
        <input type="hidden" name="profid" value="<?php echo $_SESSION['id']?>">
        <input type="submit" name="grades" value="input grades">
    </form>
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Lastname</th>
                <th>StudentID</th>
                <th>Grades</th>
                <th>Term</th>

            </tr>  
        </thead>
        <tbody>
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
                while($Row = mysqli_fetch_array($Sql)){
                    ?>
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
                                if(mysqli_num_rows($sql)> 0 ) {
                                    ?>
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


     $Insert = "INSERT INTO grades(Prof_ID, Subject_ID, Student_ID, Grades, Term, Remarks, DateTimeCreated) VALUES ('$Profid','$Subjectid','$Studentid','$Grades', '$Term','$Remark','$Date')";
     if($create = mysqli_query($conn, $Insert)){
         echo "insert";
     }else{
         echo "error";
     }
    
    }
?>
