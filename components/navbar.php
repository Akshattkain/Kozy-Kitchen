<!DOCTYPE html>
<html>
  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <style>
      #nav_element {
        color: white;
        margin-left: auto;
        margin-right: auto;
      }

      .navbar {
        padding: 0 !important;
        font-family: "Alegreya Sans SC";
      }

      .active {
        position: relative;
        overflow: hidden;
      }

      .active::after {
        background-color: white;
        content: "";
        width: 0;
        height: 3px;
        left: 0;
        bottom: 0;
        transition: width 0.35s ease 0s;
        position: absolute;
      }

      .active:hover::after {
        width: 100%;
      }
      .icon-text {
        display: inline-block;
        color: white;
      }

      .icon-text span {
        font-size: 30px !important;
      }

      .icon-text h6 {
        font-family: 'Alegreya Sans SC';
        font-size: 22px;
        float: right;
        margin: 0;
      }

      .register-btn {
        border: 1px solid white;
        border-radius: 5px;
        padding: 2px;
      }

    </style>
    <link
      href="https://fonts.googleapis.com/css?family=Alegreya Sans SC|Alegreya Sans|Allan"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Filled"
      rel="stylesheet"
    />
  </head>
  <body>
    <nav
      class="navbar navbar-expand navbar-light bg-black"
      style="background-color: rgba(0, 0, 0, 0.5) !important"
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="../pages/explore.php">
          <img
            src="../images/logo.png"
            alt="Logo"
            width="40"
            height="40"
            class="d-inline-block align-text-top"
          />
        </a>

        <a
          class="nav-link active"
          id="nav_element"
          aria-current="page"
          href="../pages/home.php"
          >Home</a
        >
        <a
          class="nav-link active"
          id="nav_element"
          aria-current="page"
          href="../pages/about.php"
          >About</a
        >

        <a
          class="nav-link active"
          id="nav_element"
          aria-current="page"
          href="../pages/community.php"
          >Community</a
        >

        <?php
          if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];  
            echo "
            <ul class='nav navbar-nav ms-auto'>
            <li class='nav-item dropdown'>
              <a href='#' class='nav-link' data-bs-toggle='dropdown'>
              <div class='icon-text'>
                <span class='material-icons'> person </span>
                <h6> $username </h6>
              </div>
              </a>
              <div class='dropdown-menu dropdown-menu-end'>
                <a href='../pages/profile.php' class='dropdown-item'>Profile</a>
                <div class='dropdown-divider'></div>
                <a href='../pages/upload.php' class='dropdown-item'
                  >Add a recipe</a
                >
                <div class='dropdown-divider'></div>
                <a href='../server/logout.php' class='dropdown-item'>Logout</a>
              </div>
            </li>
          </ul>";
          } else {
            echo "
            <ul class='nav navbar-nav ms-auto'>
            <li class='nav-item'>
              <a
                class='nav-link'
                id='nav_element'
                aria-current='page'
                href='../pages/login.php'
                style='line-height: 2em'
              >Login
              </a>
            </li>
            <li class='nav-item'>
              <a
                class='nav-link'
                id='nav_element'
                aria-current='page'
                href='../pages/register.php'
              ><div class='icon-text register-btn'>
                <img src='../images/hat.svg' width=35px />
                <h6>Register</h6>
              </div>
              </a>
            </li>
          </ul>";
          }

        ?>
      </div>
    </nav>
  </body>
</html>
