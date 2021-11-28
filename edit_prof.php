<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit_prof.css">
    <title>Edit Professor</title>
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
                <div class="container">
                <div class="title">Edit Professor</div>
                <form action="update_prof.php" method="GET">
                    <input type="hidden" name="update_id" value="<?php echo $Result['id']?>">
                    <div class="user-details">
                    <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" name="editusername" maxlength="10" value="<?php echo $Result['Username']?>">
                    <br>
                    </div>
                    <div class="input-box">
                    <span class="details">Password</span>
                    <input type="text" name="editpassword" maxlength="20" value="<?php  $Result['Password']?>">
                    <br>
                    </div>
                    <div class="input-box">
                    <span class="details">Firstname</span>
                    <input type="text" name="editfirstname"  maxlength="20" value="<?php echo $Result['Firstname']?>">
                    <br>
                    </div>
                    <div class="input-box">
                    <span class="details">Middlename</span>
                    <input type="text" name="editmiddlename" maxlength="20" value="<?php echo $Result['Middlename']?>">
                    <br>
                    </div>
                    <div class="input-box">
                    <span class="details">Lastname</span>
                    <input type="text" name="editlastname" maxlength="20" value="<?php echo $Result['Lastname']?>">
                    <br>
                    </div>
                    <div class="input-box">
                    <span class="details">Year</span>
                    <input type="text"  name="edityear"  maxlength="10" value="<?php echo $Result['Year'];?>">
                    <br>
                    </div>
                    <input class="update-btn" type="submit" name="Update" value="Update Professor">

                <?php
            }
        }
        

    } 

    ?>
    <input type="text" class="textfield" value="" name="extra7" onkeypress="return isNumber(event)" />
    <div class="wrapper">
<div class="link_wrapper">
<a href="students_records.php">Dashboard</a>
<div class="icon">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
<path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z"/>
</svg>
</div>
</div>
</div>
        </form>
        </div>
        </div>
</body>
</html>