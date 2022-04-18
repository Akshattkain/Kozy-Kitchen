<?php 

session_start(); 
include "db-connect.php";
echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>";
echo "<script src='../scripts/sweetalert.min.js'></script>";

if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['servings']) && isset($_POST['ingredients']) && isset($_POST['directions']) && isset($_POST['category']) && isset($_POST['complexity']) && isset($_POST['hours']) && isset($_POST['minutes']) && isset($_POST['uploadBtn'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = $_SESSION['username'];
    $title = validate($_POST['title']);
    $description = validate($_POST['description']);
    $servings = validate($_POST['servings']);
    $ingredients = validate($_POST['ingredients']);
	$directions = validate($_POST['directions']);
	$category = validate($_POST['category']);
	$complexity = validate($_POST['complexity']);
	$hours = validate($_POST['hours']);
	$minutes = validate($_POST['minutes']);
    $img_dish = $_FILES['img_dish']['name'];

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["img_dish"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["img_dish"]["tmp_name"]);
            if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
            } else {
              echo "File is not an image.";
              $uploadOk = 0;
            }
        }
    
        if ($_FILES["img_dish"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
    
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
    
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          } else {
            if (move_uploaded_file($_FILES["img_dish"]["tmp_name"], $target_file)) {
              echo "The file ". htmlspecialchars( basename( $_FILES["img_dish"]["name"])). " has been uploaded.";
              $sql = "INSERT INTO Recipes (username, title, description, servings, ingredients, directions, category, complexity, hours, minutes, img_dish) VALUES ('$username', '$title', '$description', '$servings', '$ingredients', '$directions', '$category', '$complexity', '$hours', '$minutes', '$img_dish');";
        if(mysqli_query($conn, $sql)) {
            echo "<script>
            swal({
                title: 'Thanks!',
                text: 'Submitted successfully',
                icon: 'success',
            }).then(val => {
                if(val) {
                    document.location='../pages/profile.php';
                }
            });
            </script>";
        } else {
            echo "<script>
            swal({
                title: 'Thanks!',
                text: 'Error in uploading recipe',
                icon: 'error',
            }).then(val => {
                if(val) {
                    document.location='../pages/upload.php';
                }
            });
            </script>";
        }
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
        }


}else{
    echo "<script>
    $(document).ready(function() {
        swal({
            title: 'Thanks!',
            text: 'All fields are required!',
            icon: 'error',
        }).then(val => {
            if(val) {
                document.location='../pages/upload.php';
            }
        });
    });
    </script>";
}

?>