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
    include 'backend.php';
    $model = new Model();
    $login = $model->StudentLogin();
    ?>
    <form action="" method="POST">
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