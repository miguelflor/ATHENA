<?php
require "conn.php";
session_start();
$intent = $_POST["intent"];
$id = $_SESSION["id"];
$pattern = $_POST["pattern"];

$pattern = strtolower($pattern);
$q = "SELECT id FROM intents WHERE tag = '$intent' and id_user = $id";
$r = mysqli_query($conn,$q);
$arr = mysqli_fetch_array($r);
$id_intent = $arr[0];
$q = "INSERT INTO patterns_intent(id_intent,pattern,`add`) VALUES ($id_intent,'$pattern',$id)";
$r = mysqli_query($conn,$q);

echo "success";
?>