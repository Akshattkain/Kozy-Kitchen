<?php
  session_start();
 include "../components/navbar.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="../styles/register.css" />
  </head>
  <body>
    <nav id="nav"></nav>

    <div class="card">
      <h4>Register</h4>

      <form action="../server/register.php" method="post">
        <input type="email" name="email" placeholder="Email" />
        <input type="text" name="full_name" placeholder="Full Name" />
        <input type="text" name="username" placeholder="Username" />
        <input type="password" name="password" placeholder="Password" />
        <input
          type="password"
          name="re-password"
          placeholder="Re-enter Password"
        />
        <button type="submit" name="submit" class="btn btn-warning">Register</button>
      </form>

      <p>
        Already have an account? <span><a href="./login.php">Login</a></span>
      </p>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
