<?php include('admin_dashboard.php'); ?>
<table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>StudentID</th>
                            <th>Firstname</th>
                            <th>Middlename</th>
                            <th>Lastname</th>
                            <th>Year & Course</th>
                            <th>Contact Number</th>
                            <th>Student Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include ('connection.php');
                        $Query = "SELECT * FROM students";
                        $sql = mysqli_query($conn,$Query);
                        if($rows = mysqli_num_rows($sql)> 0 ){
                            while($rows = mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                        <td><?php echo $rows['ID'];?></td>
                        <td><?php echo $rows['Username'];?></td>
                        <td><?php echo $rows['Password'];?></td>
                        <td><?php echo $rows['StudentID'];?></td>
                        <td><?php echo $rows['Firstname'];?></td>
                        <td><?php echo $rows['Middlename'];?></td>
                        <td><?php echo $rows['Lastname'];?></td>
                        <td><?php echo $rows['YearAndCourse'];?></td>
                        <td><?php echo $rows['ContactNumber'];?></td>
                        <td><?php echo $rows['StudentStatus'];?></td>
                        <td>
                            <form action="edit_students.php" method="POST">
                                <input type="hidden" name="edit_id" value="<?php echo $rows['ID'];?>">
                                <input type="submit" name="update" value="Update student">
                            </form>
                            <form action ="admin_validate_students.php" method="POST">
                                <input type="hidden" name="valid_id" value="<?php echo $rows['ID']?>">
                                <input type="submit" name="validate" value="Validate student">
                            </form>
                            <a href="read.php?id=<?php echo $rows['ID'];?>" class="badge badge-info">Read</a>
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