<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor's Records </title>
</head>
<body>
    
<table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Firstname</th>
                            <th>Middlename</th>
                            <th>Lastname</th>
                            <th>Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include ('connection.php');
                        $Query = "SELECT * FROM professor";
                        $sql = mysqli_query($conn,$Query);
                        if($rows = mysqli_num_rows($sql)> 0 ){
                            while($rows = mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                        <td><?php echo $rows['ID'];?></td>
                        <td><?php echo $rows['Username'];?></td>
                        <td><?php echo $rows['Password'];?></td>
                        <td><?php echo $rows['Firstname'];?></td>
                        <td><?php echo $rows['Middlename'];?></td>
                        <td><?php echo $rows['Lastname'];?></td>
                        <td><?php echo $rows['Year'];?></td>
                        <td>
                            <form action="try.php" method="POST">
                                <input type="hidden" name="subjectid" value="<?php echo $rows['ID']?>">
                                <input type="submit" name="subject" value="subject">
                            </form>
                            <a href="try.php?id=<?php echo $rows['ID'];?>" name="subject" class="badge badge-info">Add Subject </a>
                            <a href="delete.php?id=<?php echo $rows['ID']?>" class="badge badge-danger">Delete</a>
                            <a href="edit.php?id=<?php echo $rows['ID']?>" class="badge badge-sucess"> Edit </a>
                        </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
    
</body>
</html>
