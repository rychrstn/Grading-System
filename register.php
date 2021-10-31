<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/d29cb4cf2b.js" crossorigin="anonymous"></script>
    <title>Student Register</title>
</head>
<body>
    <section>
        <div class="box"></div>
        </section>
    <form method="post">
    <div class="textboxdiv">
    <div class="title"><p><b>Sign Up</b></p>
    </div>
         <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
         type="text" name="username" placeholder = "Username" required>
         <i class="far fa-user"></i>
        <br>
        
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="password" name="password" placeholder = "Password" required>
        <i class="fas fa-lock"></i>
        <br>
         <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
         type="number" name="id" placeholder = "Student ID" required>
        <br>
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="text" name="firstname" placeholder = "First Name" required>
        <br>
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
         type="text" name="middlename" placeholder = "Middle Name" required>
        <br>
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
         type="text" name="lastname" placeholder = "Last Name" required>
        <br>
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
         type="text" name="yearcourse" placeholder = "Year & Course" required>
        <br>
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="number" name="contacts" placeholder = "Contact Number" required>
        <br>
        <select style="border: 1px solid black; font-size: 20px; margin-top: 5px; width: 250px;" 
        name="status">
            <option value="">Student's Status</option>
            <option value="Regular">Regular Student</option>
            <option value="Irreguar"> Irregular Student</option>
        </select>
        <br>
        <input class="btnsignup" style="width: 250px; height: 50px; color: white; background-color:lightgreen; font-size: 20px;
        margin-bottom: 2px;"
        type="submit" name="insert" value="Sign Up">
        <br>
        <div style="font-family: monospace; font-size: 15px;">Already have an Account?</div> 
        <a style="text-decoration: none; color: #1EA4E3;
        font-family: monospace; font-size: 15px" href="student_login.php">Click here to Login</a>
    </form>
    
</body>
</html>
<script type="text/javascript">
    // Callback
    window.onbeforeunload = function(e) {
        // Turning off the event
        e.preventDefault();
    }
</script>
<?php
include 'connection.php';

    if(isset($_POST['insert'])){
        $Date = date_default_timezone_set('Asia/Manila');
        $Date = date('Y-m-d H:i:s');
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        $hash = password_hash($Password, PASSWORD_BCRYPT);
        $Studentid = $_POST['id'];
        $Firstname = $_POST['firstname'];
        $Middlename = $_POST['middlename'];
        $Lastname = $_POST['lastname'];
        $YearCourse = $_POST['yearcourse'];
        $Contacts = $_POST['contacts'];
        $Status = $_POST['status'];
        $bool = 0;

        $Sql_id = "SELECT * FROM `Students` WHERE StudentID = '$Studentid'";
        $Sql_name ="SELECT * FROM Students WHERE Firstname = '$Firstname', Middlename = '$Middlename', Lastname = '$Lastname'";
        $Res_name = mysqli_query($conn, $Sql_name);
        $Res_id = mysqli_query($conn , $Sql_id);


        if(mysqli_num_rows($Res_id) >  0 ) {
            echo "Sorry the Student ID is already registered";
        }else if(mysqli_num_rows($Res_name) > 0 ){
            echo "The name is already in our system";
        }else{
            $Query = "INSERT INTO `Students`(Username,Password,StudentID,FirstName,MiddleName,LastName,YearAndCourse,ContactNumber,StudentStatus,Valid,DateTimeCreated) VALUES ('$Username','$hash','$Studentid','$Firstname','$Middlename','$Lastname','$YearCourse','$Contacts','$Status','$bool','$Date')";
            if($sql = mysqli_query($conn,$Query)){
                echo"<script>alert('Record insert')</script>";
                header('register.php');
            }
                else{
                    echo'not inserted'.$sql."<br>".$conn->error;
                }
            }
        }
            
    ?>
