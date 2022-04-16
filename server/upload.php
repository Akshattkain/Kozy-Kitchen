<?php 

session_start(); 
include "db-connect.php";

if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['servings']) && isset($_POST['ingredients']) && isset($_POST['directions']) && isset($_POST['category']) && isset($_POST['complexity']) && isset($_POST['hours']) && isset($_POST['minutes']) && isset($_POST['uploadBtn'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    echo "<PRE>" . print_r ($_FILES, true) . "</PRE>";

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
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (empty($title)) {
		header("Location: ../pages/upload.php?error=Title is required");
	    exit();
	}else if(empty($description)){
        header("Location: ../pages/upload.php?error=Description is required");
	    exit();
	}else if(empty($servings)){
        header("Location: ../pages/upload.php?error=Number of servings is required");
	    exit();
	}else if(empty($ingredients)){
        header("Location: ../pages/upload.php?error=Ingredients is required");
	    exit();
	}else if(empty($directions)){
        header("Location: ../pages/upload.php?error=Directions is required");
	    exit();
	}else if(empty($category)){
        header("Location: ../pages/upload.php?error=Category is required");
	    exit();
	}else if(empty($complexity)){
        header("Location: ../pages/upload.php?error=Complexity is required");
	    exit();
	}else if(empty($hours) && empty($minutes)){
        header("Location: ../pages/upload.php?error=Cook time is required");
	    exit();
	} else {
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
            echo "<script>alert('Recipe uploaded successfully');
            document.location='../pages/profile.php'</script></script>";
        } else {
            header("Location: ../pages/upload.php?error=Error in uploading recipe");
            exit();
        }
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
        }
    }


}else{
	header("Location: ../pages/upload.php?error=isset");
	exit();
}

?>