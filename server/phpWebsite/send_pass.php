<?php
session_start();
$id = $_SESSION["id"];
require "conn.php";
$new = $_POST["neww"];
$old = $_POST["old"];
$conf = $_POST["conf"];

$erro = "None";


// get pass ecncryupt
$q = "SELECT pass FROM users WHERE id = $id";
$r = mysqli_query($conn,$q);
$row = mysqli_fetch_array($r);
$pass = $row[0];


if($new != $conf){
    $erro = "new_diff";
    
}
if(hash('sha256', $old) != $pass){
    $erro = "old_diff";
}

if($erro == "None"){
    $new_pass = hash('sha256',$new);
    $q = "UPDATE users SET `pass` = '$new_pass' WHERE id = $id;";
    $r = mysqli_query($conn,$q);
    echo "Done";

}else{
    echo $erro;
}

?>