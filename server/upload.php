<?php 

session_start(); 
include "db-connect.php";

if (isset($_POST['title']) && isset($_POST['servings']) && isset($_POST['ingredients']) && isset($_POST['directions']) && isset($_POST['difficulty'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = $_SERVER['username'];
    $title = validate($_POST['title']);
    $servings = validate($_POST['servings']);
    $ingredients = validate($_POST['ingredients']);
	$directions = validate($_POST['directions']);
	$difficulty = validate($_POST['difficulty']);

    if (empty($title)) {
		header("Location: ../pages/register.html?error=Title is required");
	    exit();
	}else if(empty($servings)){
        header("Location: ../pages/register.html?error=Number of servings is required");
	    exit();
	}else if(empty($ingredients)){
        header("Location: ../pages/register.html?error=Ingredients is required");
	    exit();
	}else if(empty($directions)){
        header("Location: ../pages/register.html?error=Directions is required");
	    exit();
	}else if(empty($difficulty)){
        header("Location: ../pages/register.html?error=Difficulty is required");
	    exit();
	} else {
        include "file_upload.php";
        $sql = "INSERT INTO Recipes (username, title, servings, ingredients, directions, difficulty) VALUES ('$username', '$title', '$servings', '$ingredients', '$directions', '$difficulty');";
        if(mysqli_query($conn, $sql)) {
            echo "<script>alert('Recipe uploaded successfully');
            document.location='../pages/login.html'</script></script>";
        } else {
            header("Location: ../pages/upload.html?error=Error in uploading recipe");
            exit();
        }
    }


}else{
	header("Location: ../pages/upload.html");
	exit();
}

?>