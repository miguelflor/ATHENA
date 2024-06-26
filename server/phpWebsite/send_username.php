<?php
require "conn.php";
session_start();

$id = $_SESSION["id"];
$username = $_POST["username"];

$q = "UPDATE users SET `name` = ? WHERE id =?;";
$stmt = $conn->prepare($q);
$stmt->bind_param("si", $username, $id);
$stmt->execute();
$stmt->close();

echo "success";
?>