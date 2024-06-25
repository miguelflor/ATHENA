<?php
include("conn.php");
session_start();
$value = $_POST['value'];
$id = $_SESSION['id'];
$q = "INSERT INTO Notes (id_user,notas) VALUES ($id,'$value')";
$r = mysqli_query($conn,$q);



?>