<?php
require "conn.php";
session_start();
$intent = $_POST["intent"];
$id = $_SESSION["id"];
$pattern = $_POST["pattern"];

$pattern = strtolower($pattern);
$q = "SELECT id FROM intents WHERE tag = ? and id_user = ?";
$stmt = $conn->prepare($q);
$stmt->bind_param("si", $intent, $id);
$stmt->execute();
$r = $stmt->get_result();
$stmt->close();
$arr = mysqli_fetch_array($r);
$id_intent = $arr[0];
$q = "INSERT INTO patterns_intent(id_intent,pattern,`add`) VALUES (?,?,?)";
$stmt = $conn->prepare($q);
$stmt->bind_param("isi", $id_intent, $pattern, $id);
$stmt->execute();
$stmt->close();

echo "success";
?>