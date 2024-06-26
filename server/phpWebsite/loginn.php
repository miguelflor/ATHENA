<?php
include "conn.php";
session_start();
$user = $_POST["username"];
$pass = $_POST["pass"];
$pass = hash('sha256', $pass);
$q = "SELECT id FROM users WHERE pass=? and name=?;";
$stmt = $conn->prepare($q);
$stmt->bind_param("ss", $pass, $user);
$stmt->execute();
$stmt->store_result();


if (mysqli_stmt_num_rows($stmt) > 0) {
    $stmt->bind_result($id);
    $_SESSION["id"] = $id;

    echo "ok";
} else {
    echo "nop";
}

?>