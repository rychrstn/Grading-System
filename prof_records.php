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
<div class="wrapper">
<div class="link_wrapper">
<a href="students_records.php">Dashboard</a>
<div class="icon">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
<path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z"/>
</svg>
</div>
</div>
</div>
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
                                <input type="submit" id="update" name="edit" value="Update">
                            </form>
                            <form action="delete_prof.php" method="GET">
                                <input type="hidden" name="prof_delete" value="<?php echo $rows['id']?>">
                                <input type="submit" id="delete" name="delete" value="delete">
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
