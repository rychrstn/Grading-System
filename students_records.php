<?php include('admin_dashboard.php'); ?>
<table class="table">
<link rel="stylesheet" href="css/student_records.css">

    <form action="student_search.php" method="GET">
    <input type="text" name="value" placeholder="Enter Students Name">
    <input type="submit" name="Search" value="Search Student">
    </form>
<table class="table-contents">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>StudentID</th>
                            <th>Student's name</th>
                            <th>Year & Course</th>
                            <th>Contact Number</th>
                            <th>Student Status</th>
                            <th>Valid</th>
                            <th>Date Time Creted</th>
                            <th>Date Time Updated</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include ('connection.php');
                        $Query = "SELECT a.ID,a.Username,a.Password, a.StudentID, concat(a.Firstname, '' , a.Middlename, '' ,a.Lastname) AS StudentsName , a.YearAndCourse, a.ContactNumber, a.StudentStatus, a.Valid, a.DateTimeCreated, a.DateTimeUpdated FROM students AS a";
                        $sql = mysqli_query($conn,$Query);
                        if($rows = mysqli_num_rows($sql)> 0 ){
                            while($rows = mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                        <td><?php echo $rows['ID'];?></td>
                        <td><?php echo $rows['Username'];?></td>
                        <td><?php echo $rows['Password'];?></td>
                        <td><?php echo $rows['StudentID'];?></td>
                        <td><?php echo $rows['StudentsName'];?></td>
                        <td><?php echo $rows['YearAndCourse'];?></td>
                        <td><?php echo $rows['ContactNumber'];?></td>
                        <td><?php echo $rows['StudentStatus'];?></td>
                        <td><?php echo $rows['Valid'];?></td>
                        <td><?php echo $rows['DateTimeCreated'];?></td>
                        <td><?php echo $rows['DateTimeUpdated'];?></td>
                        <td>
                            <form action="edit_students.php" method="POST">
                                <input type="hidden" name="edit_id" value="<?php echo $rows['ID'];?>">
                                <input type="submit" id = "update" name="update" value="Update student">
                            </form>
                            <form action ="admin_validate_students.php" method="POST">
                                <input type="hidden" name="valid_id" value="<?php echo $rows['ID']?>">
                                <input type="submit" id = "validate" name="validate" value="Validate student">
                            </form>
                            <form action="delete_students.php" method="GET">
                                <input type="hidden" name="delete_id" value="<?php echo $rows['ID']?>">
                                <input type="submit" name="delete" value="Delete Students">
                            </form>
                           
                        </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>