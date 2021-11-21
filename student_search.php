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
                            <th>Student's Name </th>
                            <th>Year & Course</th>
                            <th>Contact Number</th>
                            <th>Student Status</th>
                            <Th>Valid</Th>
                            <th>Date Time Created</th>
                            <Th>Date Time Updated</Th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include('connection.php');
                        if(isset($_GET['Search'])){
                            $SearchValue = $_GET['value'];
                            $Search = "SELECT a.ID,a.Username,a.Password, a.StudentID, concat(a.Firstname, '' , a.Middlename, '' ,a.Lastname) AS StudentsName , a.YearAndCourse, a.ContactNumber, a.StudentStatus, a.Valid, a.DateTimeCreated, a.DateTimeUpdated FROM students AS a
                            WHERE
                            a.Firstname LIKE '%$SearchValue%' OR
                            a.Middlename LIKE '%$SearchValue%' OR
                            a.Lastname LIKE '%$SearchValue%' OR
                            a.Username LIKE '%$SearchValue%' OR  
                            a.ContactNumber LIKE '%$SearchValue%' OR
                            a.StudentStatus LIKE '%$SearchValue%' OR
                            a.StudentID LIKE '%$SearchValue%'";
                            $Run = mysqli_query($conn , $Search);
                            while($Rows = mysqli_fetch_array($Run)){

                        
                        
                        ?>
                    <tr>
                        <td><?php echo $Rows['ID'];?></td>
                        <td><?php echo $Rows['Username']?></td>
                        <td><?php echo $Rows['Password'];?></td>
                        <td><?php echo $Rows['StudentID']?></td>
                        <td><?php echo $Rows['StudentsName']?></td>
                        <td><?php echo $Rows['YearAndCourse']?></td>
                        <td><?php echo $Rows['ContactNumber']?></td>
                        <td><?php echo $Rows['StudentStatus'];?></td>
                        <td><?php echo $Rows['Valid']?></td>
                        <td><?php echo $Rows['DateTimeCreated'];?></td>
                        <td><?php echo $Rows['DateTimeUpdated'];?></td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>