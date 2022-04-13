<?php

session_start(); 
include "db-connect.php";

$sql = "SELECT * FROM Recipes";
$result = mysqli_query($conn, $sql);

?>