<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d29cb4cf2b.js" crossorigin="anonymous"></script>  
    <link rel="stylesheet" href="css/admin_dashboard.css">
    <title>Admin Dashboard</title>
</head>
<body>
    
    <input type = "checkbox" id = "check">
<header>
    <label for = "check"><i class="fas fa-bars" id = "sidebar_btn"></i></label>
        <div class = "left_area">
            <h3>Admin <span>Dashboard</span></h3>
        </div>
        <div class = "right_area">
        <a href="admin_logout.php" class = "logout_btn">Logout</a>
        </div>
    </header>

        <div class = "sidebar">
            <center>
                <img src = "images/um.jpeg" class = "profile_image" alt = "" height="150" width="160" style = "border-radius: 100px;"> 
                <h4>Admin</h4>
            </center>
            <a href = "students_records.php"><i class="far fa-clipboard"></i><span>Student Records and Validation</span></a>
            <a href="professor_register.php"><i class="fas fa-user-tie"></i><span>Professor Register</span></a>
            <a href="subjects.php"><i class="fas fa-location-arrow"></i><span>Create Subjects</span></a>
            <a href="prof_records.php"><i class="fas fa-chalkboard-teacher"></i><span>Proffesor Records</span></a>
        </div>

        <div class="content"></div>
</body>
</html>