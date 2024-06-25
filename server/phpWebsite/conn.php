<?php
$servername = "athenaconf.hopto.org";
$username = "remote";
$password = "L5SUv27*#_";
$db = "athena";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>