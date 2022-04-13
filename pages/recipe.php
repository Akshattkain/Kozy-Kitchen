<?php
session_start();

include "../components/navbar.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Recipe</title>
    <link rel="stylesheet" href="../styles/recipe.css" />
</head>

<body>
    <div class="container">
        <div class="intro">
            <h1 class="heading">Fudgy Brownies</h1>
            <p style="font-size: 1.5vw; color: rgb(117, 117, 117); margin-top: 0 !important; margin-left: 2% !important;">Category: Dessert</p>
            <div class="rating">
                <span class="material-icons" style="margin-left: 2% !important;"> star </span>
                <span class="material-icons" style="margin-left: 1% !important;"> star </span>
                <span class="material-icons" style="margin-left: 1% !important;"> star </span>
                <span class="material-icons" style="margin-left: 1% !important;"> star </span>
                <span class="material-icons" style="margin-left: 1% !important;"> star </span>
                <p style="font-weight: 700;">3 Likes| 3 Comments | 3 Views</p>
            </div>
            <p>These are for sure the lightest, fluffiest cornbread pancakes of all time! By partially cooking the cornmeal before cooking the pancakes, there's no gritty or bitter aftertaste that you sometimes get with uncooked cornmeal. Serve with a dollop
                of homemade crème fraîche or sour cream. </p>
            <img src="../images/image 15.jpg">
        </div>
        <h1 class="heading" style="font-size: 3vw !important; margin-top: 2% !important;">Ingredients</h1>
        <p class="ingredients">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, quaerat veniam ut, hic voluptas odit laborum consequuntur omnis magnam exercitationem et voluptatibus, libero illo repellat quos laudantium pariatur enim esse?</p>
        <h1 class="heading" style="font-size: 3vw !important; margin-top: 2% !important;">Cook Time</h1>
        <br>
        <div class="stats">
            <span class="material-icons"> timer </span>
            <h6>1 Hours 12 minutes</h6>
        </div>

        <h1 class="heading" style="font-size: 3vw !important; margin-top: 4%;">Directions</h1>
        <p class="directions">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, quaerat veniam ut, hic voluptas odit laborum consequuntur omnis magnam exercitationem et voluptatibus, libero illo repellat quos laudantium pariatur enim esse?</p>
        <h1 class="heading" style="font-size: 3vw !important; margin-top: 2%;">Servings</h1>
        <div class="stats">
            <br>
            <h6>4</h6>
            <span class="material-icons"> people </span>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>