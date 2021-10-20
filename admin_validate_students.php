<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Validation</title>
</head>
<body>
    <?php

    include ('connection.php');
    if(isset($_POST['validate'])){
        $id = $_POST['valid_id'];
        $Query = "SELECT * FROM `students` WHERE `ID` = '$id'";
        $Sql = mysqli_query($conn,$Query);
        if(mysqli_num_rows($Sql)> 0 ){
            foreach($Sql as $results){
                $val = $results['Valid'];
                ?>
                <form action="validate_script.php" method="POST">
                <input type="hidden" name="edit_id" value="<?php echo $results['ID'];?>">
                <input type="checkbox"  onclick="selectOnlyThis(this)" name="valid" id="val" value="1"  <?=($val == 1) ? "checked" : "" ?>> Valid <br>
                <input type="checkbox"  onclick="selectOnlyThis(this)" name="valid"  id="val" value="0" <?=($val == 0) ? "checked" : "" ?>> Not Valid <br> 
                <input type="submit" name="validate" value="validate student">

                </form>

                <?php
            }
        }
    }
    ?>



    <script>
        function selectOnlyThis(id){
    var myCheckbox = document.getElementsByName('valid')
    Array.prototype.forEach.call(myCheckbox,function(el){
        el.checked = false;
    });
    id.checked = true;
    }
    </script>

</body>
</html>