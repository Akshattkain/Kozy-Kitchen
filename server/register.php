<?php 

session_start(); 
include "db-connect.php";

if (isset($_POST['email']) && isset($_POST['full_name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['re-password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
    $name = validate($_POST['full_name']);
    $username = validate($_POST['username']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re-password']);

	if (empty($email)) {
		header("Location: ../pages/register.html?error=Email is required");
	    exit();
	}else if(empty($name)){
        header("Location: ../pages/register.html?error=Name is required");
	    exit();
	}else if(empty($username)){
        header("Location: ../pages/register.html?error=Username is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../pages/register.html?error=Password is required");
	    exit();
	}else if(empty($re_pass)){
        header("Location: ../pages/register.html?error=Password is required");
	    exit();
	}else if($pass != $re_pass){
        header("Location: ../pages/register.html?error=Password do not match");
	    exit();
	}else{
		$sql = "SELECT * FROM Users WHERE username='$username'";

		$result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO Users (username, email, name, password) VALUES ('$username', '$email', '$name', '$pass');";
            if(mysqli_query($conn, $sql)) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                header("Location: ../pages/home.html");
		        exit();
            }
            else {
                header("Location: ../pages/register.html?error=Error in registering user");
		        exit();
            }
        } else {
            header("Location: ../pages/register.html?error=Username already present");
	        exit();
        }
	}
	
}else{
	header("Location: ../pages/register.html");
	exit();
}

?>