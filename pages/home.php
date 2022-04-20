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
  include "../components/navbar.php";
  
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
  </head>

  <body>
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

    <!-- <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
  <option value="AL">Alabama</option>
  <option value="WY">Wyoming</option>
</select> -->

    <h2>Popular Categories</h2>

    <div id="categories"></div>

    <div id="feed"></div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script>

// $(document).ready(function() {
//     $('.js-example-basic-multiple').select2();
// });

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
        console.log(recipes);

        document.getElementById("feed").innerHTML = recipes
        .map(
          (recipe) => 
          `<feed-card 
            id='${recipe['id']}'
            title='${recipe['title']}'
            username='${recipe['username']}'
            complexity='${recipe['complexity']}'
            description='${recipe['description']}'
            category='${recipe['category']}'
            imgPath='${recipe['img_dish']}'
            onclick='viewRecipe(this.id)'
           ></feed-card>`
        ).join("")

        function viewRecipe(id) {
          document.location = `../pages/recipe.php?id=${id}`;
        }
    </script>
  </body>
</html>
