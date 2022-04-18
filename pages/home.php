<?php
  session_start();

  include "../server/db-connect.php";
  include "../components/navbar.php";
  
  $sql = "SELECT * FROM Recipes";
  $result = mysqli_query($conn, $sql);
  $arr = array();
  while($row = mysqli_fetch_assoc($result)) {
    array_push($arr, $row);
  }
  
  function mapTitle($row) {
    echo "<a href='recipe.php?id=".$row['id']."'>".$row['title']."</a>";
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
          <div id="search-dropdown">
            <input
              type="text"
              class="form-control form-input"
              placeholder="Search for recepies"
              onkeyup="filterRecipes()"
              onclick="showDropdown()"
              id="search-box"
            >
            <div id="options-list" style="display: none">
            <?php array_map("mapTitle", $arr) ?>
            </div>
          </div>
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

    function filterRecipes() {
      var input, div, filter, ul, li, a, i;
      input = document.getElementById("search-box");
      filter = input.value.toUpperCase();
      div = document.getElementById("search-dropdown");
      a = div.getElementsByTagName("a");
      for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          a[i].style.display = "";
        } else {
          a[i].style.display = "none";
        }
      }
    }

    function showDropdown() {
      var div,
      div = document.getElementById("options-list");
      div.style.display = "";
    }

    window.onclick = function(event) {
      if (!event.target.matches('.form-input')) {
        var div,
        div = document.getElementById("options-list");
        div.style.display = "none";
      }
    }

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
            id='${recipe['id']}'
            title='${recipe['title']}'
            username='${recipe['username']}'
            complexity='${recipe['complexity']}'
            description='${recipe['description']}'
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
