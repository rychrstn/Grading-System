<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/prof_records.css">
    <title>Professor's Records </title>
</head>
<body>
    
<table class="table-contents">
                <thead>
                        
                    <tr>
                        
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Professor's Name</th>
                            <th>Year</th>
                            <th>Action</th>
                    </tr>
                        
                </thead>
                    <tbody>
                        <?php
                        include ('connection.php');
                        $Query = "SELECT a.id,a.Username, a.Password, concat(a.Firstname, ' ' ,a.Middlename, ' ' ,a.Lastname) as Fullname , a.Year FROM professor AS a";
                        $sql = mysqli_query($conn,$Query);
                        if($rows = mysqli_num_rows($sql)> 0 ){
                            while($rows = mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                        <td><?php echo $rows['id'];?></td>
                        <td><?php echo $rows['Username'];?></td>
                        <td><?php echo $rows['Password'];?></td>
                        <td><?php echo $rows['Fullname'];?></td>
                        <td><?php echo $rows['Year'];?></td>
                        <td style="background: white;">
                            <form action="edit_prof.php" method="GET">
                                <input type="hidden" name="edit_id" value="<?php echo $rows['id']?>">
                                <input type="submit" name="edit" value="Update">
                            </form>
                            <form action="delete_prof.php" method="GET">
                                <input type="hidden" name="prof_delete" value="<?php echo $rows['id']?>">
                                <input type="submit" name="delete" value="delete">
                            </form>
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
