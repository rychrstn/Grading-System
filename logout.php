<?php

session_start();

if(isset($_SESSION['username']))
{
	unset($_SESSION['username']);

}

header("Location: student_login.php");
die;