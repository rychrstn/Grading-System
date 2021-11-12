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
    include('connection.php');
    if(isset($_GET['edit'])){
        $edit_id = $_GET['edit_id'];
        $SelectProf = "SELECT * FROM professor WHERE id = '$edit_id'";
        $Sql = mysqli_query($conn, $SelectProf);
        if(mysqli_num_rows($Sql)> 0 ) {
            foreach($Sql As $Result){
                ?>
                <form action="update_prof.php" method="GET">
                    <input type="hidden" name="update_id" value="<?php echo $Result['id']?>">
                    <label>Username</label>
                    <input type="text" name="editusername" maxlength="10" value="<?php echo $Result['Username']?>">
                    <br>
                    <label>Password</label>
                    <input type="text" name="editpassword" maxlength="20" value="<?php  $Result['Password']?>">
                    <br>
                    <label> Firstname </label>
                    <input type="text" name="editfirstname"  maxlength="20" value="<?php echo $Result['Firstname']?>">
                    <br>
                    <label> Middlename </label>
                    <input type="text" name="editmiddlename" maxlength="20" value="<?php echo $Result['Middlename']?>">
                    <br>
                    <label> Lastname </label>
                    <input type="text" name="editlastname" maxlength="20" value="<?php echo $Result['Lastname']?>">
                    <br>
                    <label> Year </label>
                    <input type="text"  name="edityear"  maxlength="10" value="<?php echo $Result['Year'];?>">
                    <br>
                    <input type="submit" name="Update" value="Update Professor">

                <?php
            }
        }
        

    } 

    ?>
    <input type="text" class="textfield" value="" name="extra7" onkeypress="return isNumber(event)" />
    
        </form>
</body>
</html>