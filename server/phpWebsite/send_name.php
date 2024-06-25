<?php
require "conn.php";
session_start();

$id = $_SESSION["id"];
$name = $_POST["name"];

$q = "UPDATE users SET `real_name` = '$name' WHERE id = $id;";
$r = mysqli_query($conn,$q);

echo "success";
?>