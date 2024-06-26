<?php
include ("conn.php");
session_start();
$value = $_POST["value"];

$q = "DELETE FROM Contacts WHERE id = ?";
$stmt = $conn->prepare($q);
$stmt->bind_param("i", $value);
$stmt->execute();
$stmt->close();

?>