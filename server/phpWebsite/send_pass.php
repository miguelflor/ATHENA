<?php
session_start();
$id = $_SESSION["id"];
require "conn.php";
$new = $_POST["neww"];
$old = $_POST["old"];
$conf = $_POST["conf"];

$erro = "None";


// get pass ecncryupt
$q = "SELECT pass FROM users WHERE id = ?";
$stmt = $conn->prepare($q);
$stmt->bind_param("i", $id);
$stmt->execute();
$r = $stmt->get_result();
$stmt->close();
$row = mysqli_fetch_array($r);
$pass = $row[0];


if ($new != $conf) {
    $erro = "new_diff";

}
if (hash('sha256', $old) != $pass) {
    $erro = "old_diff";
}

if ($erro == "None") {
    $new_pass = hash('sha256', $new);
    $q = "UPDATE users SET `pass` = ? WHERE id = ?;";
    $stmt = $conn->prepare($q);
    $stmt->bind_param("si", $new_pass, $id);
    $stmt->execute();
    $stmt->close();
    echo "Done";

} else {
    echo $erro;
}

?>