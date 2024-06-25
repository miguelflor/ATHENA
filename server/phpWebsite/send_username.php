<?php
require "conn.php";
session_start();

$id = $_SESSION["id"];
$username = sanitize_input($_POST["username"]);

$q = "UPDATE users SET `name` = '$username' WHERE id = $id;";
$r = mysqli_query($conn, $q);

echo "success";
?>