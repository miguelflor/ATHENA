<?php
include ("conn.php");
session_start();
$value = $_POST['value'];
$id = $_SESSION['id'];
$q = "INSERT INTO Notes (id_user,notas) VALUES (?,?)";
$stmt = $conn->prepare($q);
$stmt->bind_param("is", $id, $value);
$stmt->execute();
$stmt->close();



?>