<?php
include("conn.php");
session_start();
$value = $_POST['value'];
$id = $_SESSION['id'];

$q = "INSERT INTO Alarms (id_user,alarme) VALUES ($id,'$value')";
$r = mysqli_query($conn,$q);



?>