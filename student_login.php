<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="css/login.css">
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
    <div class="title"><h1>The Univerity of Manila</h1>
    <img class="um_logo" src="images/um.jpeg" alt="umlogo" height="120" width="140"></a>
    </div>
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
			Don't have an Account?
			</br>
			<a style = "color: #1EA4E3"; href="register.php">Click here to Sign up</a>
		</div>
        </div>
    </div>
    </form>


</body>
</html>
    

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
            $Login = "SELECT *  FROM `students` WHERE Username = '$Username' ";
            $Sql = mysqli_query($conn,$Login);
            if($Sql->num_rows > 0 ) {
                $row = mysqli_fetch_assoc($Sql);
                $_SESSION['username'] = $row['Username'];
                    if(password_verify($Password , $row['Password'])){
                        if($Bool == 1){
                            header('location:index.php');
                        }else{
                        echo "<div class = FieldError><p>You're not yet validated</p></div>";
                        }
                        }else{
                        echo "<div class = FieldError1><p>Wrong Password!</p></div>";
                        }
            }else{
                echo "<div class = FieldError2><p>Account do not Exist!</p></div>";
            }
        }
    }


?>