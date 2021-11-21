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
    <a href="prof_logout.php">Logout</a>
    <form action="grades.php" method="POST">
        <input type="hidden" name="profid" value="<?php echo $_SESSION['id']?>">
        <input type="submit" name="grades" value="input grades">
    </form>
    <form action="prof_search.php" method="GET">
        <input type="text" name="value" placeholder="Search data">
        <input type="submit" name="search" value="Search Data">
    </form>
<table>
    <tr>
        <thead>
            <th>Student's Name </th>
            <th>Student ID</th>
            <th>Subject Code</th>
            <th>Grades</th>
            <th>Term</th>
            <th>Remarks</th>
        </thead>
    </tr>
    <tbody>
    <?php
include('connection.php');
if(isset($_GET['search'])){
    $SearchValue = $_GET['value'];

    $Search =  "SELECT a.ID, a.StudentID,a.YearAndCourse, concat(a.Firstname, ' ', a.Middlename, ' ', a.Lastname) as Student,b.Grades,b.Remarks, b.Term,c.SubjectCode, c.SubjectName,concat(d.Firstname, ' ', d.Middlename, ' ', d.Lastname) as Professor, b.DateTimeCreated FROM students AS a JOIN grades AS b ON b.Student_ID = a.ID JOIN subjects c ON c.id = b.Subject_ID JOIN professor AS d ON d.id = b.Prof_ID WHERE a.Firstname LIKE '%$SearchValue%' OR 
    a.Middlename LIKE '%$SearchValue%' OR 
    a.Lastname LIKE '%$SearchValue%' OR 
    a.StudentID LIKE '%$SearchValue%' OR 
    b.Grades LIKE '%$SearchValue%' OR
    b.Term LIKE '%$SearchValue%' OR 
    b.Remarks LIKE '%$SearchValue%' OR 
    c.SubjectCode LIKE '%$SearchValue%'
    ";
    
        $Run = mysqli_query($conn , $Search);
        while($Rows = mysqli_fetch_array($Run)){
            ?>
            <tr>
            <td><?php echo $Rows['Student']?></td>
            <td><?php echo $Rows['StudentID']?></td>
            <td><?php echo $Rows['SubjectCode'];?></td>
            <td><?php echo $Rows['Grades'];?></td>
            <td><?php echo $Rows['Term']?></td>
            <td><?php echo $Rows['Remarks']?></td>
            </tr>
             <?php
        }
    }


?>
        <
   
        </tr>
    </tbody>
</table>

        
