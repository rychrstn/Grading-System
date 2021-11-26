<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit_students.css">
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
                <div class="container">
                    <div class="title">Update Information</div>
                <form action="update_details.php" method="POST">
                <input type="hidden" name="edit_id" value="<?php echo $id?>">
                <div class="user-details">
                <div class="input-box">
                <span class="details">Username</span>
                <input class="input-box"  type="text" name="editusername"  maxlength="20" value="<?php echo $results['Username'];?>">
                <p><?php if(isset($errors['editusername'])) echo $errros['editusername']?></p>
                </div>
                <div class="input-box">
                <span class="details">Password</span>
                <input type="password" name="editpassword"  maxlength="20" value="<?php  $results['Password'];?>">
                </div>
                <div class="input-box">
                <span class="details">Student ID</span>
                <input type="text" name="editid"  maxlength="7" value="<?php echo $results['StudentID'];?>">
                
                </div>
                <div class="input-box">
                <span class="details">Firstname</span>
                <input type="text" name="editfirstname"  maxlength="20" value="<?php echo $results['Firstname']?>">
                
                </div>
                <div class="input-box">
                <span class="details">Middlename</span>
                <input type="text" name="editmiddlename"  maxlength="20" value="<?php echo $results['Middlename']?>">
                
                </div>
                <div class="input-box">
                <span class="details">Lastname</span>
                <input type="text" name="editlastname"  maxlength="20" value="<?php echo $results['Lastname']?>">
                
                </div>
                <div class="input-box">
                <span class="details">Year & Course</span>
                <input type="text" name="edityearcourse" maxlength="19"  value="<?php echo $results['YearAndCourse']?>">
                
                </div>
                <div class="input-box">
                <span class="details">Contact Number</span>
                <input type="text" name="editnumber"  maxlength="11"  onkeypress="return isNumber(event)" value="<?php echo $results['ContactNumber']?>">
                </div>
                <div class="input-box">
                <span class="student-details">Student Status</span>
                <br>
                <select class="select" name="editstudentstatus">
                <option value="Regular"<?php if ($results['StudentStatus'] === 'Regular') echo ' selected="selected"'?>>Regular</option>
                <option value="Irregular"<?php if ($results['StudentStatus'] === 'Irregular') echo ' selected="selected"'?>>Irregular</option>
                </div>
                </div>
                </div>
                
                    <?php
                
                    if($results['StudentStatus'] == 'Regular'){
                        echo "Selected";
                
                    }else if($results['StudentStatus'] == 'Irregular'){
                        echo "Selected";
                    }
                    ?>
                </select>
                <br>
                <input class="update-btn" type="submit" name="update_students" value="Update">




                <?php
            }
        }
    } 
    ?>
    </form>
    <script>
        function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

        </script>
</body>
</html>