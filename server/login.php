<?php 

session_start(); 
include "db-connect.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: ../pages/login.html?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../pages/login.html?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM Users WHERE email='$email' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['email'] = $row['email'];
            	header("Location: ../pages/home.php");
		        exit();
            }else{
				header("Location: ../pages/login.html?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: ../pages/login.html?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: ../pages/login.html");
	exit();
}

?>