<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Subjects</title>
</head>
<body>
    <?php
    include 'backend.php';
    $model = new Model();
    $
    ?>
    <form action="" method="POST">
        <label>Subject Code</label>
        <input type="text" name="subjectcode" id="">
        <br>
        <label for="">Subject Name</label>
        <input type="text" name="subjectname" id="">
        <br>
        <label for="">Unit</label>
        <input type="text" name="unit">
        <br>
        <input type="submit" name="create"value="Create">
    </form>
    
</body>
</html>