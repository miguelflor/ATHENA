<?php
include ("conn.php");
session_start();
$value = sanitize_input($_POST['value']);
$id = $_SESSION['id'];
if (is_numeric($id)) {
    $q = "INSERT INTO Alarms (id_user,alarme) VALUES ($id,'$value')";
    $r = mysqli_query($conn, $q);
}


?>