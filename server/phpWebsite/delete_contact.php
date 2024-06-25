<?php
include ("conn.php");
session_start();
$value = $_POST["value"];
if (is_numeric($value)) {
    $q = "DELETE FROM Contacts WHERE id = $value";
    $r = mysqli_query($conn, $q);

}




?>