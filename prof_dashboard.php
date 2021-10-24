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
    <title>Document</title>
</head>
<body>
   <!-- sidebar -->
    <p> Prof: <?php echo  $_SESSION['firstname']. $_SESSION['middlename'] . $_SESSION['lastname'] ?></p>
    
    
    <h2><?php echo $_SESSION['firstname']   ."\t". $_SESSION['middlename'] . "\t" . $_SESSION['lastname'] ?></h2>
    <h2><?php echo $_SESSION['year'];?></h2>
    <h2><?php echo $_SESSION['id']?></h2>

    <form action="grades.php" method="POST">
        <input type="hidden" name="prof_id" value="<?php echo $Profid ?>">
        <input type="submit" name="grades" value="Input grades">
    </form>
   
</body>
</html>