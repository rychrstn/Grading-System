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
    include ('connection.php');
    if(isset($_POST['update'])){
        $id = $_POST['edit_id'];
        $Query = "SELECT * FROM `students` WHERE `ID` = '$id'";
        $Sql = mysqli_query($conn,$Query);
        if(mysqli_num_rows($Sql)> 0 ){
            foreach($Sql as $results){
                ?>
                <form action="update_students.php" method="POST">
                <label> Username </label>
                <input type="text" name="editusername" value="<?php echo $results['Username'];?>">
                <br>
                <label> Password </label>
                <input type="password" name="editpassword" value="<?php  $results['Password'];?>">
                <br>
                <label> Student ID</label>
                <input type="text" name="editid" value="<?php echo $results['StudentID'];?>">
                <br>
                <label> Firstname</label>
                <input type="text" name="editfirstname" value="<?php echo $results['Firstname']?>">
                <br>
                <label> Middlename </label>
                <input type="text" name="editmiddlename" value="<?php echo $results['Middlename']?>">
                <br>
                <label> Lastname</label>
                <input type="text" name="editlastname" value="<?php echo $results['Lastname']?>">
                <br>
                <label> Year & Ccourse </label>
                <input type="text" name="edityearcourse" value="<?php echo $results['YearAndCourse']?>">
                <br>
                <label> Contact Number</label>
                <input type="text" name="editnumber" value="<?php echo $results['ContactNumber']?>">
                <br>
                <label> Student Status</label>
                <select name="editstudentstatus">
                    <option value="Regular">
                    <?php
                    if($results['StudentStatus'] == 'Regular')
                    {
                        echo "selected";
                    }
                    ?>
                    Regular </option>
                    <option value="Irregular"> 
                    <?php
                    if($results['StudentStatus'] == 'Irregular')
                    {
                        echo "selected";
                    }
                    ?>
                </select>
                <input type="text" name="editstudentstatus" value="<?php echo $results['StudentStatus'];?>">
                <input type="submit" name="update_students" value="Update Students">




                <?php
            }
        }
    } 
    ?>
    </form>
</body>
</html>