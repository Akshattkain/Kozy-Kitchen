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
    <title>Upload</title>
    <link rel="stylesheet" href="../styles/upload.css" />
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Alegreya Sans
    SC|Alegreya Sans|Allan" rel="stylesheet" />
  </head>

  <body>
    <nav id="nav"></nav>

    <div class="heading-image">
      <h1 class="heading">SHARE YOUR RECIPE WITH KOZY-KITCHEN</h1>
      <img
        src="../images/—Pngtree—vegetable salad food vegetables vegetable_3822948 1.jpg"
        class="image"
      />
    </div>
    <div class="upload-form">
      <form action="../server/upload.php" method="post" enctype='multipart/form-data'>
        <h3
          style="
            font-family: 'Alegreya Sans SC';
            font-weight: 700;
            font-size: 50px;
            margin-left: 5%;
          "
        >
          Recipe Title
        </h3>
        <input
          type="text"
          name="title"
          class="form-control"
          style="width: 30%; margin-left: 5%"
        />
        <br /><br />
        <h3
          style="
            font-family: 'Alegreya Sans SC';
            font-weight: 700;
            font-size: 50px;
            margin-left: 5%;
          "
        >
          Number of Servings
        </h3>
        <input
          type="number"
          name="servings"
          class="form-control"
          style="width: 30%; margin-left: 5%"
        />
        <br /><br />
        <h3
          style="
            font-family: 'Alegreya Sans SC';
            font-weight: 700;
            font-size: 50px;
            margin-left: 5%;
          "
        >
          Ingredients
        </h3>
        <textarea
          class="form-control"
          name="ingredients"
          style="width: 30%; margin-left: 5%"
        ></textarea>
        <br /><br />
        <h3
          style="
            font-family: 'Alegreya Sans SC';
            font-weight: 700;
            font-size: 50px;
            margin-left: 5%;
          "
        >
          Directions
        </h3>
        <textarea
          class="form-control"
          name="directions"
          style="width: 50%; margin-left: 5%"
        ></textarea>
        <br /><br />
        <h3
          style="
            font-family: 'Alegreya Sans SC';
            font-weight: 700;
            font-size: 50px;
            margin-left: 5%;
          "
        >
          Difficulty
        </h3>
        <select
          class="form-select"
          name="difficulty"
          style="width: 30%; margin-left: 5%"
        >
          <option selected>Select a Difficulty</option>
          <option value="1">Easy</option>
          <option value="2">Medium</option>
          <option value="3">Hard</option>
        </select>
        <br /><br />
        <h3
          style="
            font-family: 'Alegreya Sans SC';
            font-weight: 700;
            font-size: 50px;
            margin-left: 5%;
          "
        >
          Upload a photo
        </h3>
        <input
          type="file"
          name="img_dish"
          class="form-control"
          style="width: 30%; margin-left: 5%"
        />
        <p
          style="color: rgb(133, 133, 133); font-size: 15px; margin-left: 5.5%"
        >
          max upload size: 5MB
        </p>
        <br /><br />
        <button
          type="submit"
          name="uploadBtn"
          class="btn btn-warning"
          style="font-size: 30px; margin-left: 45% !important"
        >
          Submit
        </button>
        <br /><br />
      </form>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script>
      $("#nav").load("../components/navbar.html");
    </script>
  </body>
</html>
