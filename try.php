<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include ('connection.php');
if(isset($_POST['subject'])){
    $Prof_id = $_POST['subjectid'];
    $SelectID = "SELECT * FROM professor where `ID` = '$Prof_id'";
    $sql = mysqli_query($conn, $SelectID);
    if(mysqli_num_rows($sql)> 0 ){
        foreach($sql as $result);{

    ?>
    <input type="hidden" name="prof_id" value="<?php echo $result['ID'] ?>">
        <?php
        require ('connection.php');
        $Select = "SELECT * FROM subjects";
        $sql = mysqli_query($conn,$Select);
        if($sql->num_rows>0){
            while($row=mysqli_fetch_array($sql)){

                $sub_id = $row['id'];
                ?>
                <select name="subject">
                    <option value="" selected disabed hidden> Select Subject </option>

                    <option value="<?php echo $row['id'];?>"><?php echo $row['SubjectCode'];?></option>
                    <?php
            }
        }
        ?>
                    
                </select>
                
                    

          
        <input type="submit" name="register" value="register">
    </form>
    <?php
        }
     }
 }
        ?>
</body>
</html>
<?php 
if(isset($_POST['register'])){
    $prof_id = $_POST['edit_id'];
            
    $Query = "UPDATE `subjects` SET `Prof_id` = '$prof_id' WHERE `id` =  '$Prof_id'";
    if($sql = mysqli_query($conn,$Query)){
        echo"<script>alert('record added');</script>";
    }else{
        echo "ERROR".$sql."<br>".$conn->error;

    }


}