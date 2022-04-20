<?php 

session_start(); 
include "db-connect.php";
echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>";
echo "<script src='../scripts/sweetalert.min.js'></script>";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['submit'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	$sql = "SELECT * FROM Users WHERE email='$email' AND password='$pass'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && $row['password'] === $pass) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            header("Location: ../pages/home.php");
		    exit();
        }else{
			echo "<script>
			$(document).ready(function() {
				swal({
					title: 'Error!',
					text: 'All fields are required!',
					icon: 'error',
				}).then(val => {
					if(val) {
						document.location='../pages/login.php';
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
				text: 'User does not exists!',
				icon: 'error',
			}).then(val => {
				if(val) {
					document.location='../pages/login.php';
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
                document.location='../pages/login.php';
            }
        });
    });
    </script>";
}

?>