<?php
include('connection.php');
session_start();
if(!isset($_SESSION['firstname']  , $_SESSION['middlename'] , $_SESSION['lastname'] , $_SESSION['year'], $_SESSION['id'])){
    header("location:prof_login.php?action=login");
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
    <input type="hidden" name="prof_id" value="<?php echo $_SESSOIN['id']?>>">
    <h2><?php echo $_SESSION['year'];?></h2>
    <h2><?php echo $_SESSION['id']?></h2>
    <select name="terms">
        <option selected disabled>Select term </option>
        <option value="prelims">Prelims</option>
        <option value="midterms">Midterms</option>
        <option value="finals">Finals</option>
    </select>
    
    <?php
    $profid = ['prof_id'];
    $SelectSub  = "SELECT * FROM subjects WHERE Prof_id = '".$_SESSION['id']."'";
    $Run = mysqli_query($conn, $SelectSub);
    if($Row = mysqli_num_rows($Run)> 0 ){
            ?>

            <select>
                <option selected disabled> Select Subject </option>
                <?php   while($Row = mysqli_fetch_array($Run)){ ?>
                    <option value="<?php echo $Row['Prof_id']?>"><?php echo $Row['SubjectCode'];?></option>
          

            <?php
        }

    }
 

    ?>
      </select>

</body>
</html>