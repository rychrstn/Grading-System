
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
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="textboxdiv">
    <div class="title"><p><b>Sign Up</b></p>
    </div>
    <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="text" maxlength="20"  name="username" id="UserName" placeholder = "Username"required>
        <i class="far fa-user"></i>
        <br>
        
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="password" maxlength="20" name="password" id="PassWord" placeholder = "Password" required>
        <i class="fas fa-lock"></i>
        <br>
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="text" maxlength="7" id="ID" name="id" onkeypress="return isNumber(event)" placeholder = "Student ID" required>
        <br>
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="text" name="firstname" id="FirstName" maxlength="20" placeholder = "First Name" required>
        <br>
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="text" name="middlename" id="MiddleName"  maxlength="10"  placeholder = "Middle Name" required>
        <br>
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="text" name="lastname" id="LastName"  maxlength="10" placeholder = "Last Name" required>
        <br>
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="text" name="yearcourse" id="YearCourse" maxlength="10" placeholder = "Year & Course" required>
        <br>
        <input style="border: 1px solid black; font-size: 20px; margin-top: 5px;"
        type="text" name="contacts" id="Contacts" maxlength="11"  value="09" onkeypress="return isNumber(event)"  placeholder = "Contact Number" required>
        <br>
        <select style="border: 1px solid black; font-size: 20px; margin-top: 5px; width: 250px;" 
        name="status">

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
        font-family: monospace; font-size: 15px" href="student_login.php">Click here to Login</a>  <br>
    </form>
    
</body>
</html>

<?php

include 'connection.php';
    if(isset($_POST['insert'])){
        $Date = date_default_timezone_set('Asia/Manila');
        $Date = date('Y-m-d H:i:s');
        $Username = trim($_POST['username']);
        $Password = trim($_POST['password']);
        $hash = password_hash($Password, PASSWORD_BCRYPT);
        $Studentid = trim($_POST['id']);
        $Firstname = trim($_POST['firstname']);
        $Middlename = trim($_POST['middlename']);
        $Lastname = trim($_POST['lastname']);
        $YearCourse = $_POST['yearcourse'];
        $Contacts = trim($_POST['contacts']);
        $Status = $_POST['status'];
        $bool = 0;

        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/',  $Username) == true)
            {
                echo "Invalid Username";
    
            }

            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]1234567890/', $Firstname) == True){
                echo "Invalid Firstname"; 
                exit();
            }

            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]1234567890/', $Middlename) == True){
                echo  "Invalid Middlename";
                exit();
            }

            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]1234567890/', $Lastname) == True){
                echo  "Invalid Lastname";
                exit();
            }
            
            
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+]/', $YearCourse) == True){
                echo "Invalid Year And Course";
            }

            

        if(strlen($Studentid) < 7){
            echo  "Complete the Student ID number";
            exit();
        }

        if(strlen($Contacts) < 11){
            
            echo  "Complete The Contact Number ";
            exit();

        }

        $Sql_id = "SELECT * FROM `Students` WHERE StudentID = '$Studentid'";
        $Sql_name ="SELECT * FROM Students WHERE Firstname = '$Firstname' AND Middlename = '$Middlename' AND  Lastname = '$Lastname'";
        $Sql_contacts = "SELECT * FROM Students WHERE ContactNumber ='$Contacts'";
        $Res_name = mysqli_query($conn, $Sql_name);
        $Res_id = mysqli_query($conn , $Sql_id);
        $Res_contacts = mysqli_query($conn, $Sql_contacts);


        if(mysqli_num_rows($Res_id) >  0 ) {
            echo "Sorry the Student ID is already registered";
        }else if(mysqli_num_rows($Res_name) > 0 ){
            echo "The name is already in our system";
        }elseif(mysqli_num_rows($Res_contacts) > 0 ){
            echo "The Mobile number is already taken";
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
