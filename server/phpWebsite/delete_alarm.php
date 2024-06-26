<?php
include ("conn.php");
session_start();
$value = $_POST["value"];

$q = "DELETE FROM Alarms WHERE id = ?";
$stmt->bind_param("i", $value);
$stmt->execute();
$stmt->close();


?>