<?php
include ('connection.php');
if(isset($_POST['update_students'])){
    $Update_id = $_POST['edit_id'];
    $Date = date_default_timezone_set('Asia/Manila');
    $Date = date('Y-m-d H:i:s');
    $EditUsername = mysqli_real_escape_string($conn, $_POST['editusername']);
    $EditPassword = mysqli_real_escape_string($conn, $_POST['editpassword']);
    $Password = password_hash($EditPassword , PASSWORD_BCRYPT);
    $EditID  =  $_POST['editid'];
    $EditFirstname = mysqli_real_escape_string($conn, $_POST['editfirstname']);
    $EditMiddlename = mysqli_real_escape_string($conn, $_POST['editmiddlename']);
    $EditLastname = mysqli_real_escape_string($conn, $_POST['editlastname']);
    $EditYearandCourse = mysqli_real_escape_string($conn, $_POST['edityearcourse']);
    $EditNumber = mysqli_real_escape_string($conn, $_POST['editnumber']);
    $EditStudentStatus = $_POST['editstudentstatus'];

    

    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/',  $EditUsername) == true)
        {
        
            $erros['editusername'] = "Invalid Username ";
            exit();

        }

        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/',  $EditFirstname) == True){
            echo "Invalid Firstname";
            exit();
        }

        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/',  $EditMiddlename) == True){
            echo  "Invalid Middlename";
            exit();
        }

        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/',  $EditLastname) == True){
            echo "Invalid Lastname";
            exit();
        }
        
        
        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+]/', $EditYearandCourse) == True){
            echo "Invalid Year And Course ";
            exit();
        }

        

    if(strlen($EditID) < 7){
        echo "Complete the Student ID number";
    }

    if(strlen($EditNumber) < 11){
        echo "Complete The Contact Number";
        exit();

    }

            $Query = "UPDATE `students` SET Username = '$EditUsername', Password = '$Password', StudentID = '$EditID', Firstname = '$EditFirstname', Middlename = '$EditMiddlename' , Lastname = '$EditLastname' , YearAndCourse = '$EditYearandCourse', ContactNumber = '$EditNumber', StudentStatus = '$EditStudentStatus', DateTimeUpdated = '$Date' WHERE ID = '$Update_id'";
            $Sql = mysqli_query($conn, $Query);
    
            if($Sql) {
                echo "record updated";
                header('location:students_profile.php');
            }else{
                echo "error".$Sql."<br>".$conn->error;
            }

        }


        



?>