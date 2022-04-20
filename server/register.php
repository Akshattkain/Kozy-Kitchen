<?php 

session_start(); 
include "db-connect.php";
echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>";
echo "<script src='../scripts/sweetalert.min.js'></script>";

if (isset($_POST['email']) && isset($_POST['full_name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['re-password']) && isset($_POST['submit'])) {

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

	if($pass != $re_pass){
		echo "<script>
		$(document).ready(function() {
			swal({
				title: 'Error!',
				text: 'Passwords do not match!',
				icon: 'error',
			}).then(val => {
				if(val) {
					document.location='../pages/register.php';
				}
			});
		});
		</script>";
	}

	$sql = "SELECT * FROM Users WHERE username='$username'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) != 0) {
		echo "<script>
		$(document).ready(function() {
			swal({
				title: 'Error!',
				text: 'Username already present!',
				icon: 'error',
			}).then(val => {
				if(val) {
					document.location='../pages/register.php';
				}
			});
		});
		</script>";
	}

	$sql = "SELECT * FROM Users WHERE email='$email'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) != 0) {
		echo "<script>
		$(document).ready(function() {
			swal({
				title: 'Error!',
				text: 'Email already in use!',
				icon: 'error',
			}).then(val => {
				if(val) {
					document.location='../pages/register.php';
				}
			});
		});
		</script>";
	}
        $sql = "INSERT INTO Users (username, email, name, password) VALUES ('$username', '$email', '$name', '$pass');";
        if(mysqli_query($conn, $sql)) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            header("Location: ../pages/home.php");
		    exit();
        }
        else {	
			echo "<script>
			$(document).ready(function() {
				swal({
					title: 'Error!',
					text: 'Error in registering user!',
					icon: 'error',
				}).then(val => {
					if(val) {
						document.location='../pages/register.php';
					}
				});
			});
			</script>";
        }
	
}else{
	echo "<script>
    $(document).ready(function() {
        swal({
            title: 'Error!',
            text: 'All fields are required!',
            icon: 'error',
        }).then(val => {
            if(val) {
                document.location='../pages/register.php';
            }
        });
    });
    </script>";
}

?>