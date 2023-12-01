<?php

$servername = "localhost";
$database = "dataware2";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// mysqli_close($conn);

?>
