<?php
include("conn.php");
session_start();
$value = $_POST['value'];
$id = $_SESSION['id'];
$number = $_POST["number"];

$q = "INSERT INTO Contacts (id_user,name,number) VALUES ($id,'$value','$number')";
$r = mysqli_query($conn,$q);





?>