<?php
  session_start();
  if(isset($_SESSION['username']) && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $name = $_SESSION['name']; 
  } else {
    echo "<script>alert('Please login to continue!');
    document.location='../pages/login.php'</script>";
  }

include "../components/navbar.php";
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Upload</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="../styles/upload.css" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="../scripts/sweetalert.min.js"></script>
    </head>

    <body>
        <div class="heading-image">
            <h1 class="heading">SHARE YOUR RECIPE WITH KOZY-KITCHEN</h1>
            <img src="../images/dish.png" class="image" />
        </div>
        <div class="upload-form">
            <form action="../server/upload.php" method="post" enctype='multipart/form-data'>
                <h3>Recipe Title</h3>
                <input type="text" name="title" class="form-control" style="width: 30%; margin-left: 5%" />
                <br /><br />

                <h3>Description</h3>
                <textarea class="form-control" name="description" style="width: 50%; margin-left: 5%"></textarea>
                <br /><br />

                <h3>Number of Servings</h3>
                <input type="number" name="servings" class="form-control" style="width: 30%; margin-left: 5%" />
                <br /><br />

                <h3>Ingredients</h3>
                <textarea class="form-control" name="ingredients" style="width: 30%; margin-left: 5%"></textarea>
                <br /><br />

                <h3>Directions</h3>
                <textarea class="form-control" name="directions" style="width: 50%; margin-left: 5%"></textarea>
                <br /><br />

                <h3>Category</h3>
                <select class="form-select" name="category" style="width: 30%; margin-left: 5%">
                    <option selected disabled>Select a Category</option>
                    <option value="Indian">Indian</option>
                    <option value="Chinese">Chinese</option>
                    <option value="Italian">Italian</option>
                    <option value="Mexican">Mexican</option>
                    <option value="American">American</option>
                    <option value="Thai">Thai</option>
                    <option value="Desserts">Desserts</option>
                    <option value="Japanese">Japanese</option>
                </select>
                <br /><br />

                <h3>Complexity</h3>
                <select class="form-select" name="complexity" style="width: 30%; margin-left: 5%">
                    <option selected disabled>Select a Complexity</option>
                    <option value="Easy">Easy</option>
                    <option value="Medium">Medium</option>
                    <option value="Hard">Hard</option>
                </select>
                <br /><br />

                <h3>Cook Time</h3>
                <input type="number" name="hours" placeholder="Hours" class="form-control" style="width: 30%; margin-left: 5%" />
                <br>
                <input type="number" name="minutes" placeholder="Minutes" class="form-control" style="width: 30%; margin-left: 5%" />
                <br /><br />

                <h3>Upload a photo</h3>
                <input type="file" name="img_dish" class="form-control" style="width: 30%; margin-left: 5%" />
                <p style="color: rgb(133, 133, 133); font-size: 15px; margin-left: 5.5%">
                    Max upload size: 5MB
                </p>
                <br /><br />

                <button id="upload_btn" type="submit" name="uploadBtn" class="btn btn-warning" style="font-size: 30px; margin-left: 45% !important">
                    Submit
                </button>
                <br /><br />
            </form>
        </div>
    </body>
</html>