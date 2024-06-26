<?php

include ("conn.php");

$value = $_POST["value"];

$q = "DELETE FROM patterns_intent WHERE id = ?";
$stmt = $conn->prepare($q);
$stmt->bind_param("i", $value);
$stmt->execute();
$stmt->close();
?>