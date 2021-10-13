<!-- adfadf -->
<?php
class model{
    private $Server = 'localhost:3307';
    private $Username = 'root';
    private $Password;
    private $DB = 'onlinegradingsystem';
    private $conn;


    public function __construct(){
        try{
            $this->conn = new mysqli($this->Server, $this->Username, $this->Password, $this->DB);
        } catch(\Throwable $th){
                echo "connection failed".$th->getMessage();

            }
        }
        // Register
        public function Insert(){
            if(isset($_POST['insert'])){

                $Date = date_default_timezone_set('Asia/Manila');
                $Date = date('Y-m-d H:i:s');
                $Username = $_POST['username'];
                $Password = $_POST['password'];
                $Studentid = $_POST['id'];
                $Firstname = $_POST['firstname'];
                $Middlename = $_POST['middlename'];
                $Lastname = $_POST['lastname'];
                $YearCourse = $_POST['yearcourse'];
                $Contacts = $_POST['contacts'];
                $Status = $_POST['status'];

                $Query = "INSERT INTO `Students`(Username,Password,StudentID,FirstName,MiddleName,LastName,YearAndCourse,ContactNumber,StudentStatus,DateTImeCreated) VALUES ('$Username','$Password','$Studentid','$Firstname','$Middlename','$Lastname','$YearCourse','$Contacts','$Status','$Date')";
                if($sql = $this->conn->query($Query)){
                    echo"<script>alert('Record insert')</script>";
                    
                }else{
                    echo'not inserted';

                }

            }
        }

        public function ProfRegister(){
            if(isset($_POST['register'])){

            }
        }

        //Create

        public function CreateSubjects(){
            if(isset($_POST['create'])){
                $Date = date_default_timezone_set('Asia/Manila');
                $Date = date('Y-m-d H:i:s');
                $SubjectCode = $_POST['subjectcode'];
                $SubjectName = $_POST['subjectname'];
                $Unit = $_POST['unit'];

                $Query = "INSERT INTO Subjects(SubjectCode, SubjectName,Unit,DateTimeCreated) Values('$SubjectCode',$SubjectName','$Unit','$Date')";
                if($sql = $this->conn->query($Query)){
                    echo"<script>alert('Subject created successfully');</script>";
                }
            }

        }



          // Login 
        public function StudentLogin(){
            if(isset($_POST['login'])){
                $Username = mysqli_real_escape_string($this->conn,$_POST['username']);
                $Password = mysqli_real_escape_string($this->conn,$_POST['password']);

                if(empty($Username) || empty($Password)){
                    echo "<script>alert('empty input field');</script>";

                }else{
                    $Query = "SELECT * FROM Students Where Username = '$Username' And Password = '$Password'";
                    $sql = $this->conn->query($Query);

                    if(mysqli_num_rows($sql)> 0 ){
                        echo "Hello";
                    }else{
                        echo "Not hello";

                    }
                }
            }
        }

        public function AdminLogin(){
            if(isset($_POST['login'])){
                $Username = mysqli_real_escape_string($this->conn,$_POST['username']);
                $Password = mysqli_real_escape_string($this->conn,$_POST['password']);

                if(empty($Username) || empty($Password)){
                    echo "<script>alert('empty input field');</script>";

                }else{
                    $Query = "SELECT * FROM admin Where Username = '$Username' And Password = '$Password'";
                    $sql = $this->conn->query($Query);

                    if(mysqli_num_rows($sql)> 0 ){
                        echo "Hello";
                    }else{
                        echo "Not hello";

                    }
                }
            }
        }
        public function Fetch(){
            $Query = "SELECT * FROM Students";
            $sql = $this->conn->query($Query);
            return $sql;
    }
}



    

    

?>