<?php
session_start();

include "../server/db-connect.php";
include "../components/navbar.php";
$id = $_GET['id'];
$sql = "SELECT * FROM Recipes Where id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Recipe</title>
    <link rel="stylesheet" href="../styles/recipe.css" />
</head>

<body>
    <div class="container">
        <img src=<?php echo "../uploads/".$row['img_dish'] ?>>
        <div class="intro">
            <h1 class="heading"><?php echo $row['title'] ?></h1>
            <p style="font-size: 1.5vw; color: rgb(117, 117, 117); margin-top: 0 !important; margin-left: 2% !important;">Category: <?php echo $row['category'] ?></p>
            <p style="font-weight: 700;">3 Likes| 3 Comments | 3 Views</p>
            <div class="rating">
                <span class="material-icons" style="margin-left: 2% !important;"> star </span>
                <span class="material-icons" style="margin-left: 1% !important;"> star </span>
                <span class="material-icons" style="margin-left: 1% !important;"> star </span>
                <span class="material-icons" style="margin-left: 1% !important;"> star </span>
                <span class="material-icons" style="margin-left: 1% !important;"> star </span>
                
            </div>
            <p><?php echo $row['description'] ?></p>
        </div>        
        <h1 class="heading" style="font-size: 3vw !important; margin-top: 2% !important;">Ingredients</h1>
        <p class="ingredients"><?php echo $row['ingredients'] ?></p>
        <h1 class="heading" style="font-size: 3vw !important; margin-top: 2% !important;">Cook Time</h1>
        <br>
        <div class="stats">
            <span class="material-icons"> timer </span>
            <h6><?php echo $row['hours'] ?> Hours <?php echo $row['minutes'] ?> minutes</h6>
        </div>

        <h1 class="heading" style="font-size: 3vw !important; margin-top: 4%;">Directions</h1>
        <p class="directions"><?php echo $row['directions'] ?></p>
        <h1 class="heading" style="font-size: 3vw !important; margin-top: 2%;">Servings</h1>
        <div class="stats">
            <br>
            <h6><?php echo $row['servings'] ?></h6>
            <span class="material-icons"> people </span>
        </div>
    </div>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
</body>

</html>