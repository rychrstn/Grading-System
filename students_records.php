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
                        include 'backend.php';
                        $model = new Model();
                        $rows = $model->Fetch();
                        
                        if(!empty($rows)){
                            foreach($rows as $row){
                        ?>
                        <tr>
                        <td><?php echo $row['ID'];?></td>
                        <td><?php echo $row['Username'];?></td>
                        <td><?php echo $row['Password'];?></td>
                        <td><?php echo $row['StudentID'];?></td>
                        <td><?php echo $row['Firstname'];?></td>
                        <td><?php echo $row['Middlename'];?></td>
                        <td><?php echo $row['Lastname'];?></td>
                        <td><?php echo $row['YearAndCourse'];?></td>
                        <td><?php echo $row['ContactNumber'];?></td>
                        <td><?php echo $row['StudentStatus'];?></td>
                        <td>
                            <a href="read.php?id=<?php echo $row['ID'];?>" class="badge badge-info">Read</a>
                            <a href="delete.php?id=<?php echo $row['ID']?>" class="badge badge-danger">Delete</a>
                            <a href="edit.php?id=<?php echo $row['ID']?>" class="badge badge-sucess"> Edit </a>
                        </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>