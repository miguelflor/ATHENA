<?php
require "conn.php";
session_start();

$id = $_SESSION["id"];
$name = $_POST["name"];

$q = "UPDATE users SET `real_name` = ? WHERE id = ?;";
$stmt = $conn->prepare($q);
$stmt->bind_param("si", $name, $id);
$stmt->execute();
$stmt->close();


echo "success";
?>