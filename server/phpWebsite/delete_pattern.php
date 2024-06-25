<?php

include("conn.php");

$value = $_POST["value"];
$q = "DELETE FROM patterns_intent WHERE id = $value";
$r = mysqli_query($conn,$q);

?>

