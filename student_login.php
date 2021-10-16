</head>
<body>
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
require ('connection.php');
session_start();
if(isset($_POST['login'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        echo '<script>alert("Both fields are empty");</script>';
    }else{
            $Username = mysqli_real_escape_string($conn,$_POST['username']);
            $Password = mysqli_real_escape_string($conn,$_POST['password']);
            $Bool = $_POST['bool'];
            $Login = "SELECT ID,Password FROM `students` WHERE Username = '$Username'";
            $Sql = mysqli_query($conn,$Login);
            if($Sql->num_rows > 0 ) {
                $data = $Sql->fetch_array();
                if(!password_verify($Password , $data['Password'])){
                    echo"Is wrong";
                    if($Bool != 1){
                        echo "You're not yet validated";
                    }else{
                        header('Location:index.php');

                    }
                }else{
                    
                }

            }else{
                echo "no account".$Sql."<br>".$conn->error;
            }
            // if(mysqli_num_rows($Sql) > 0 )
            // {
            //     while($row = mysqli_fetch_assoc($Sql))
            //     {
            //         if(password_verify($Password , $row['Password']))
            //         {
            //             $_SESSION['username'] = $Username;
            //             echo "hello";

            //         }else{
            //             echo "wrong details";
            //         }
            //     }
            // }else{
            //     echo "ERROR";
            // }
        }
    }


?>