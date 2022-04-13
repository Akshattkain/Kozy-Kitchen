<?php
    $servername= "localhost";
    $usernmae= "root";
    $password = "";
    
    $db_name = "Kozy-Kitchen";
    
    $conn = mysqli_connect($servername, $usernmae, $password, $db_name);
    
    if (!$conn) {
        echo "Connection failed!";
    }
?>