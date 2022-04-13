<?php
  session_start();
  $username = $_SESSION['username'];
  $name = $_SESSION['name'];
  if($username==""){
    echo "<script>alert('Please login to continue!');
    document.location='../pages/login.html'</script>";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Profile</title>
    <link rel="stylesheet" href="../styles/profile.css" />
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="../scripts/custom-button.js"></script>
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
        icon="add_circle_outline"
        iconSize="1em"
        text="Add new Recipe"
        textSize="15px"
      />
      <div class="grid-container">
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
      </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script>
      $("#nav").load("../components/navbar.html");
      $(".grid-item").load("../components/profile-card.html")
    </script>
  </body>
</html>
