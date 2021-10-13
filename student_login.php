<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
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
    <form action="" method="POST">
        <input type="hidden" name="bool" value="<?php echo $id ?>">
        <?php
        }
    }

    ?>
        <label>Username</label>
        <input type="text" name="username" placeholder="Enter Username">
        <br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter Password">
        <br>
        <input type="submit" name="login" value="Login">
    </form>
   
</body>
</html>
<?php
include ('connection.php');
if(isset($_POST['login'])){
    $Username = mysqli_real_escape_string($conn,$_POST['username']);
    $Password = mysqli_real_escape_string($conn,$_POST['password']);
    $Password = password_hash($Password, PASSWORD_DEFAULT);
    $bool = $_POST['bool'];



    if(empty($Username) || empty($Password)){
        echo "<script>alert('empty input fields');</script>";

    }else{
        $Query = "SELECT * FROM `Students` WHERE Username = '$Username' AND Password = '$Password'";
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
        }
    }
}

mysqli_close($conn);
?>