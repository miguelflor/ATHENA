<?php
$servername = "athenaconf.hopto.org";
$username = "remote";
$password = "L5SUv27*#_";
$db = "athena";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//anti SQL injection to string
function sanitize_input($input)
{

  $forbidden = array("'", "\"", ";", "\\");
  $safe_input = str_replace($forbidden, "", $input);

  return $safe_input;
}

?>