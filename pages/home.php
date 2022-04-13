<?php
  session_start();
  // if(isset($_SESSION['username']) && isset($_SESSION['name'])) {
  // $username = $_SESSION['username'];
  // $name = $_SESSION['name'];
  // if($username==""){
  //   echo "<script>alert('Please login to continue!');
  //   document.location='../pages/login.html'</script>";
  // }
  // }

  include "../server/db-connect.php";
  
  $sql = "SELECT * FROM Recipes";
  $result = mysqli_query($conn, $sql);
  $arr = array();
  while($row = mysqli_fetch_assoc($result)) {
    array_push($arr, $row);
  }
  
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" href="../styles/home.css" />
    <script src="../scripts/feed-card.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  </head>

  <body>
    <nav id="nav"></nav>
    <div
      class="row d-flex justify-content-center align-items-center search-box"
    >
      <div class="col-md-6">
        <div class="form">
          <span class="material-icons"> search </span>
          <input
            type="text"
            class="form-control form-input"
            placeholder="Search for recepies"
          />
        </div>
      </div>
    </div>

    <h2>Popular Categories</h2>

    <div id="categories"></div>

    <div id="feed"></div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script>
      $("#nav").load("../components/navbar.html");

      var categories = [
        { url: "../images/indian.png", name: "Indian" },
        { url: "../images/chinese.png", name: "Chinese" },
        { url: "../images/italian.png", name: "Italian" },
        { url: "../images/mexican.png", name: "Mexican" },
        { url: "../images/american.png", name: "American" },
        { url: "../images/thai.png", name: "Thai" },
        { url: "../images/desserts.png", name: "Desserts" },
        { url: "../images/japanese.png", name: "Japanese" },
      ];

      document.getElementById("categories").innerHTML = categories
        .map(
          (category) =>
            `<div class="category-container" style="background-image: url(${category.url})">
            <div class="center">
              <p>${category.name}</p>
              </div>
              </div>
            `
        )
        .join("");

        var recipes = <?php echo json_encode($arr); ?>;

        document.getElementById("feed").innerHTML = recipes
        .map(
          (recipe) => 
          `<feed-card 
            title='${recipe['title']}'
            username='${recipe['username']}'
            complexity='${recipe['difficulty']}'
            description='Our favorite brownies recipe from scratch.'
            imgPath='${recipe['img_dish']}'
           />`
        ).join()
    </script>
  </body>
</html>