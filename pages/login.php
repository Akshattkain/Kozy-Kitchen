<?php
  session_start();
 include "../components/navbar.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="../styles/register.css" />
  </head>
  <body>
    <nav id="nav"></nav>

    <div class="card">
      <h4>Login</h4>

      <form action="../server/login.php" method="post">
        <input type="email" name="email" placeholder="Email" />
        <input type="password" name="password" placeholder="Password" />
        <button type="submit" name="submit" class="btn btn-warning">Login</button>
      </form>

      <p>
        New User? <span><a href="./register.php">Register</a></span>
      </p>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
