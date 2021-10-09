<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Register</title>
</head>
<body>
    <?php
    include 'backend.php';
    $model = new Model();
    $insert = $model->Insert();
    ?>
    <form action="" method="POST">
        <label> Username </label>
        <input type="text" name="username">
        <br>
        <label> Password </label>
        <input type="password" name="password">
        <br>
        <label>Student ID</label>
        <input type="number" name="id">
        <br>
        <label>Firstname</label>
        <input type="text" name="firstname">
        <br>
        <label>Middlename</label>
        <input type="text" name="middlename">
        <br>
        <label>Lastname</label>
        <input type="text" name="lastname">
        <br>
        <label>Year & Course</label>
        <input type="text" name="yearcourse">
        <br>
        <label>Contact Number</label>
        <input type="number" name="contacts">
        <br>
        <label>Student's Status </label>
        <select name="status">
            <option value="">--Select--</option>
            <option value="Regular">Regular Student</option>
            <option value="Irreguar"> Irregular Student</option>
        </select>
        <br>

        <input type="submit" name="insert" value="register">


    </form>
</body>
</html>