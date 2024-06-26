<?php
include ("conn.php");
session_start();
$value = $_POST['value'];
$id = $_SESSION['id'];
$number = $_POST["number"];

$q = "INSERT INTO Contacts (id_user,name,number) VALUES (?,?,?))";
$stmt = $conn->prepare($q);
$stmt->bind_param("iss", $id, $value, $number);
$stmt->execute();
$stmt->close();


?>