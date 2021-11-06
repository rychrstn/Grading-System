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
                <tbody>
                    <?php
                 
                    include('connection.php');
                    $Select = "SELECT  a.StudentID,a.YearAndCourse, concat(a.Firstname, ' ', a.Middlename, ' ', a.Lastname) as Student,b.Grades, b.Term,c.SubjectCode, c.SubjectName,concat(d.Firstname, ' ', d.Middlename, ' ', d.Lastname) as Professor
                FROM
                students AS a
                    JOIN
                grades AS b ON b.Student_ID = a.ID
                    JOIN
                subjects c ON c.id = b.Subject_ID
                    JOIN
                professor AS  d ON d.id = b.Prof_ID

                WHERE b.Prof_ID = '".$_SESSION['id']."'";
                $Run = mysqli_query($conn, $Select);
                while($Row = mysqli_fetch_assoc($Run)){
                        ?>
                        <tr>
                        <td><?php echo $Row['Student'];?></td>
                        <td><?php echo $Row['SubjectCode'];?></td>
                        <td><?php echo $Row['Grades']?></td>
                        <td><?php echo $Row['Term']?></td>

<?php
                    }
                
                ?>
                 </tr>
                </tbody>
                </table>
                
