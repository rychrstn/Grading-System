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
                <th>Grades</th>
                <th>Term</th>

            </tr>  
        </thead>
        <tbody>
            <?php
            include('connection.php');
            $Select = "SELECT students.Firstname, students.ID, students.Middlename, students.Lastname, grades.Grades, grades.Term, grades.id FROM students LEFT JOIN grades ON Grades.id = students.ID";
            $Sql = mysqli_query($conn, $Select);
            if($Row = mysqli_num_rows($Sql)> 0 ){
                while($Row = mysqli_fetch_array($Sql)){
                    $Firstname = $Row['Firstname'];

                    ?>
                    <tr>
                        <td><?php echo $Row['ID'];?></td>
                        <td><?php echo $Firstname;?></td>
                        <td><?php echo $Row['Middlename'];?></td>
                        <td><?php echo $Row['Lastname'];?></td>
                        <td><?php echo $Row['Grades']?></td>
                        <td><?php echo $Row['Term']?></td>
                        <td> 
                            <form action="demo.php" method="POST">
                                <input type="hidden" name="studentid" value="<?php echo $Row['ID']?>">
                                <input type="hidden" name="gradeid" value="<?php echo $Row['id']?>">
                                <input type="submit" name="submit" value="submit grade">
                                
                            </form>
                        </td>

                    </tr>
                    <?php
                }
            } 
        
            ?>
        </tbody>
        </table>

            
</body>
</html>