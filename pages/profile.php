<?php
  session_start();
  if(isset($_SESSION['username']) && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $name = $_SESSION['name']; 
  } else {
    echo "<script>alert('Please login to continue!');
    document.location='../pages/login.php'</script>";
  }

  include "../server/db-connect.php";
  
  $sql = "SELECT * FROM Recipes WHERE username='$username'";
  $result = mysqli_query($conn, $sql);
  $arr = array();
  while($row = mysqli_fetch_assoc($result)) {
    array_push($arr, $row);
  }

  include "../components/navbar.php";

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Profile</title>
    <link rel="stylesheet" href="../styles/profile.css" />
    <script src="../scripts/custom-button.js"></script>
    <script src="../scripts/profile-card.js"></script>
  </head>
  <body>
    <nav id="nav"></nav>

    <div class="details-container">
      <div class="profile-icon-container">
        <span class="material-icons-outlined profile-icon"> person </span>
      </div>
      <div class="profile-details">
        <h3><?php echo $username;?></h3>
        <custom-button
          icon="edit"
          iconSize="1em"
          text="Edit Profile"
          textSize="15px"
        />
        <h5><?php echo $name;?></h5>
        <div class="stats">
          <span class="material-icons"> fastfood </span>
          <h6>15 Recipes</h6>
        </div>
        <div class="stats">
          <span class="material-icons"> people_alt </span>
          <h6>30K Followers</h6>
        </div>
      </div>
    </div>

    <div class="about-me">
      <div class="stats">
        <h6>About Me</h6>
        <span class="material-icons"> edit_note </span>
      </div>
      <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit enim
        saepe maiores distinctio vitae architecto consequuntur ratione soluta
        ipsum accusantium, nihil sed ut blanditiis esse unde ad magnam delectus
        incidunt?
      </p>
    </div>

    <div class="content">
      <h3>My Recipes</h3>
      <custom-button
        id="add_new_recipe_btn"
        icon="add_circle_outline"
        iconSize="1em"
        text="Add new Recipe"
        textSize="15px"
        onclick="onAddRecipeClick()"
        style="float: right;"
      ></custom-button>

      <div id="grid-container"></div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script>

      function onAddRecipeClick() {
        document.location = "../pages/upload.php";
      }

      var recipes = <?php echo json_encode($arr); ?>;

      document.getElementById("grid-container").innerHTML = recipes
        .map(
          (recipe) => 
          `<div style=" margin-top: 60px;">
          <profile-card
            id='${recipe['id']}'
            title='${recipe['title']}'
            imgPath='${recipe['img_dish']}'
            category='${recipe['category']}'
            onclick='viewRecipe(this.id)'
            style="display: inline-block;"
           ></profile-card>
           </div>
           `
        ).join("");

        function viewRecipe(id) {
          document.location = `../pages/recipe.php?id=${id}`;
        }

    </script>
  </body>
</html>
