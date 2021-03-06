<?php
  session_start();
 include "../components/navbar.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Community</title>
    <link rel="stylesheet" href="../styles/community.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Allura"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <script src="../scripts/custom-button.js"></script>
  </head>
  <body>

    <fieldset class="reset-this fieldset">
      <legend class="reset-this legend">Top 5 Recipes</legend>
      <table class="top-5-table">
        <tr>
          <td>Dish 1</td>
          <td>User 1</td>
        </tr>
        <tr>
          <td>Dish 2</td>
          <td>User 2</td>
        </tr>
        <tr>
          <td>Dish 3</td>
          <td>User 3</td>
        </tr>
        <tr>
          <td>Dish 4</td>
          <td>User 4</td>
        </tr>
        <tr>
          <td>Dish 5</td>
          <td>User 5</td>
        </tr>
      </table>
    </fieldset>

    <custom-button
      class="new-discussion-btn"
      icon="add"
      iconSize="25px"
      text="New Discussion"
      textSize="18px"
    ></custom-button>

    <div class="discussions">
      <div class="discussion-card">
        <h5>How much water do i need to cook rice?</h5>
        <div>
          <p style="display: inline-block">
            Posted by: User 1 | January 30, 2022
          </p>
          <p style="float: right">20 views | 5 comments</p>
        </div>
      </div>
      <hr />
      <div class="discussion-card">
        <h5>How much water do i need to cook rice?</h5>
        <div>
          <p style="display: inline-block">
            Posted by: User 1 | January 30, 2022
          </p>
          <p style="float: right">20 views | 5 comments</p>
        </div>
      </div>
      <hr />
      <div class="discussion-card">
        <h5>How much water do i need to cook rice?</h5>
        <div>
          <p style="display: inline-block">
            Posted by: User 1 | January 30, 2022
          </p>
          <p style="float: right">20 views | 5 comments</p>
        </div>
      </div>
      <hr />
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
