<?php
$servername = "localhost:3306";
    $database = "tienda_online";
    $username = "daw";
    $password = "daw";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
    }
?>