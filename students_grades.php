<?php
session_start();
if(!isset($_SESSION['username'], $_SESSION['id'], $_SESSION['studentid'])){
    header("location:student_login.php?action=login");

}

?>

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
    if(isset($_POST['students'])){
        $_SESSION['id'];
    }
    ?>
    <table>
        <thead>
            <tr>
                <th>Professor Name</th>
                <th>Subject</th>
                <th>Grades</th>
                <th>Term</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('connection.php');
            $SelectStudent = "SELECT  a.StudentID,a.YearAndCourse, concat(a.Firstname, ' ', a.Middlename, ' ', a.Lastname) as Student,b.Grades, b.Term,c.SubjectCode, c.SubjectName,concat(d.Firstname, ' ', d.Middlename, ' ', d.Lastname) as Professor
            FROM
            students AS a
                JOIN
            grades AS b ON b.Student_ID = a.ID
                JOIN
            subjects c ON c.id = b.Subject_ID
                JOIN
            professor AS  d ON d.id = b.Prof_ID

            WHERE b.Student_ID= '".$_SESSION['id']."'";
             $Run = mysqli_query($conn, $SelectStudent);
             while($Row = mysqli_fetch_assoc($Run)){
            ?>
            <tr>
                <td><?php echo $Row['Professor'];?></td>
                <td><?php echo $Row['SubjectCode'];?></td>
                <td><? echo $Row['Term']?></td>
                <td><?php echo $Row['Grades'];?></td>
            </tr>
            <?php
             }
            

            ?>
        </tbody>
    </table>
    
</body>
</html>