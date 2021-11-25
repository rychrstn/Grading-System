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
    <!--<p> Prof: <?php /*echo  $_SESSION['firstname']. $_SESSION['middlename'] . $_SESSION['lastname']*/ ?></p>
    <p> Prof: <?php /*echo  $_SESSION['firstname']. $_SESSION['middlename'] . $_SESSION['lastname'] */?></p>
    <h2><?php /*echo $_SESSION['firstname']   ."\t". $_SESSION['middlename'] . "\t" . $_SESSION['lastname']*/ ?></h2>
    <h2><?php /*echo $_SESSION['year'];?></h2>
    <h2><?php echo $_SESSION['id']*/?></h2>-->
    <div class="title">
    <h2>The University of Manila</h2> 
    </div>
    <div class="address">
    <h2>546 Delos Santos St, 403, Manila, 1008 Metro Manila</h2>
    </div>
    <div class="UM">
    <img class="um_logo" src="images/um.jpeg" alt="umlogo" height="100" width="120">
    </div>
    <i class="fas fa-user-tie"></i>
    <h2 class = "profname"><?php echo $_SESSION['firstname']   ."\t". $_SESSION['middlename'] . "\t" . $_SESSION['lastname'] ?></h2>
    <h2 class="year"><?php echo $_SESSION['year'];?></h2>
    <a href="prof_logout.php" class="logout">Logout</a>
    <form action="grades.php" method="POST">
        <input type="hidden" name="profid" value="<?php echo $_SESSION['id']?>">
        <input type="submit" name="grades" value="input grades" class="inp_grd">
    </form>
    <form action="prof_search.php" method="GET">
        <input class="search" type="text" name="value" placeholder="Search data">
        <input class="srch_btn" type="submit" name="search" value="Seek">
    </form>
        <table class="table-contents">
        <thead>
            <tr>
                    <th>Student's Fullname</th>
                    <th>StudentID</th>
                    <th>Subjects</th>                    
                    <th>Grades</th>
                    <th>Term</th>
                    <th>Remark</th>
                    <th>Update</th>
                    <th>Delete</th>
                <tbody>
                    <?php
                 
                    include('connection.php');
                    $Select = "SELECT a.ID, a.StudentID,a.YearAndCourse, concat(a.Firstname, ' ', a.Middlename, ' ', a.Lastname) as Student,b.Grades,b.Remarks, b.Term,c.SubjectCode,b.id, c.SubjectName,concat(d.Firstname, ' ', d.Middlename, ' ', d.Lastname) as Professor FROM students AS a JOIN grades AS b ON b.Student_ID = a.ID JOIN subjects c ON c.id = b.Subject_ID JOIN professor AS d ON d.id = b.Prof_ID
                WHERE b.Prof_ID = '".$_SESSION['id']."'";
                $Run = mysqli_query($conn, $Select);
                while($Row = mysqli_fetch_assoc($Run)){
                    $gradesid = $Row['id'];
                        ?>
                        <tr>
                            <td><?php echo $Row['Student']?></td>
                            <td><?php echo $Row['StudentID']?></td>
                            <td><?php echo $Row['SubjectCode'];?></td>
                            <td><?php echo $Row['Grades'];?></td>
                            <td><?php echo $Row['Term']?></td>
                            <td><?php echo $Row['Remarks']?></td>
                        <td>
                            <form action="edit_grades.php" method="GET">
                                <input type="hidden" name="gradesid" value="<?php echo $Row['id'];?>">
                                <input type="submit" name="update" value="Update Grades">
                            </form>
                    
                        </td>
                        <td>
                            <form action="delete_grade.php" method="GET">
                            <input type="hidden" name="gradesid" value="<?php echo $Row['id'];?>">
                            <input type="submit" name="delete" value="Delete Grade">
                            </form>
                        </td>

<?php
                    }
                
                ?>
                 </tr>
                </tbody>
                </table>
                
