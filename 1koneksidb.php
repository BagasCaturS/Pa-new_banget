<?php
$servername = "localhost";
$username = "root";
$password = "";
// $db         = "the_pa";
$db = "dummy_the2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("<H1>Connection failed: " . mysqli_connect_error() . "</H1>");
}

?>