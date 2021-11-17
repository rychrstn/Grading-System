<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/d29cb4cf2b.js" crossorigin="anonymous"></script>
</head>
</html>
    <?php
    include ('connection.php');
    $Select = "SELECT * FROM `students`";
    $sql = mysqli_query($conn,$Select);
    if($rows = mysqli_num_rows($sql)> 0 ){
        while($rows = mysqli_fetch_array($sql)){
            $id = $rows['Valid'];
    ?>
    <form action="" method="POST">
        <input type="hidden" name="bool" value="<?php echo $id ?>">
        <?php
        }
    }

    ?>
        <section>
    <div class="box"></div>
        </section>
    <form action="" method="POST">
    <div class="textboxdiv">
    <div class="title"><h1>The University of Manila</h1>
    <img class="um_logo" src="images/um.jpeg" alt="umlogo" height="120" width="140"></a>
    </div>
    <i class="fas fa-user-graduate"></i>
    <p style="position:fixed; margin-top: 40px; margin-left: 630px;">Welcome Student!</p>
    <br>
    <br>
    <br>
    <br>
    <div>
        <input style="border: 2px solid lightgreen; font-size: 20px"
        type="text" name="username" placeholder="Username">
        <br>
        <br>
        <input style="border: 2px solid lightgreen; font-size: 20px"
         type = "password" name="password" placeholder="Password">
        <br>
        <br>
        <br>
        <input class="btnlogin" style="width: 100px; height: 50px; color: white; background-color:black; font-size: 20px;" type="submit" name="login" value="Login">
        <div class="signup">
			<div style="font-size: 15px;">Don't have an Account?</div>
			<a style = "color: #1EA4E3; font-size: 15px;" href="register.php">Click here to Sign up</a>
		</div>
        </div>
    </div>
    </form>
</body>
</html>
<?php
session_start();
require ('connection.php');
if(isset($_POST['login'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        echo '<script>alert("Both fields are empty");</script>';
    }else{
            $Username = mysqli_real_escape_string($conn,$_POST['username']);
            $Password = mysqli_real_escape_string($conn,$_POST['password']);
            $Bool = $_POST['bool'];
            $Login = "SELECT a.ID,a.Username, a.Password, a.StudentID, concat(a.Firstname,' ', a.Middlename, ' ' ,a.Lastname) as Fullname , a.YearAndCourse, a.StudentStatus, a.ContactNumber , a.Valid FROM students As a  WHERE Username = '$Username' ";
            $Sql = mysqli_query($conn,$Login);
            if($Sql->num_rows > 0 ) {
                $row = mysqli_fetch_assoc($Sql);
                $_SESSION['fullname'] = $row['Fullname'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['id'] = $row['ID'];
                $_SESSION['studentid'] =  $row['StudentID'];
                $_SESSION['password'] = $row['Password'];
                $_SESSION['contactnumber'] = $row['ContactNumber'];
                $_SESSION['studentstatus'] = $row['StudentStatus'];
                $_SESSION['yearandcourse'] = $row['YearAndCourse'];
                $_SESSION['status'] = $row['StudentStatus'];
                $_SESSION['valid'] = $row['Valid'];
                $Bool = $row['Valid'];
                    if(password_verify($Password , $row['Password'])){
                      if($Bool == 1){
                        header('location:index.php');
                      } else  {
                        echo "<div class = FieldError><p>You're not yet validated</p></div>";
                      }
                    } else  {
                      echo "<div class = FieldError1><p>Incorrect Password!</p></div>";
                    }
            }else{
                echo "<div class = FieldError2><p>Account do not Exist!</p></div>";
            }
        }
    }


?>