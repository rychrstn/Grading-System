<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>The University of Manila</title>
</head>
<body>
    <?php
    include ('connection.php');
    $Select = "SELECT * FROM `Students`";
    $sql = mysqli_query($conn,$Select);
    if($rows = mysqli_num_rows($sql)> 0 ){
        while($rows = mysqli_fetch_array($sql)){
            $id = $rows['Valid'];
    ?>
    
    <section>
    <div class="box"></div>
        </section>
    <form action="" method="POST">
<<<<<<< HEAD
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
=======
        <input type="hidden" name="bool" value="<?php echo $id ?>">
        <?php
        }
    }

    ?>
        <label>Username</label>
        <input type="text" name="username" placeholder="Enter Username">
>>>>>>> dd4a69d4dff81accc6c63f8560d8e831cd1ba3a7
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
<<<<<<< HEAD
    
    
</body>
</html>
<?php
include 'connection.php';
session_start();	
=======
   
</body>
</html>
<?php
include ('connection.php');
>>>>>>> dd4a69d4dff81accc6c63f8560d8e831cd1ba3a7
if(isset($_POST['login'])){
    $Username = mysqli_real_escape_string($conn,$_POST['username']);
    $Password = mysqli_real_escape_string($conn,$_POST['password']);
    $Password = password_hash($Password, PASSWORD_DEFAULT);
    $bool = $_POST['bool'];



    if(empty($Username) || empty($Password)){
        echo "<script>alert('empty input fields');</script>";

    }else{
        $Query = "SELECT * FROM `Students` WHERE Username = '$Username' AND Password = '$Password'";
<<<<<<< HEAD
        $sql = mysqli_query($conn, $Query);
        if(mysqli_num_rows($sql) > 0 ){
            echo "hellos";
            header('Location:index.html');
        }
        else{
            echo "<script>alert('The Username or Password is incorrect');</script>";
            //echo "Error".$sql."<br>".$conn->error;
=======
        $Sql = mysqli_query($conn,$Query);

        if(mysqli_num_rows($sql)> 0)
        {
            if($bool == 1 )
            {
                echo "hello";
            }
            else{
                echo "Your account is not yet validated by the office";
            }
            while($row = mysqli_fetch_assoc($sql))
            {
                if(password_verify($Passowrd,$row['password']))
                {
                    echo "right password";
                }
            }
            
        }else{
            echo "error".$sql."<br>".$conn->error;
>>>>>>> dd4a69d4dff81accc6c63f8560d8e831cd1ba3a7
        }
    }
}

mysqli_close($conn);
?>