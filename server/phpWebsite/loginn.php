<?php
include "conn.php";
session_start();
$user=$_POST["username"];
$pass = $_POST["pass"];
$pass = hash('sha256', $pass);
$q = "SELECT id FROM users WHERE pass='$pass' and name='$user';";
$r = mysqli_query($conn,$q);

if ( mysqli_num_rows($r)>0 ){
    
    $arr = mysqli_fetch_array($r);
    $_SESSION["id"]=$arr[0];
   
    echo "ok";
}else{
    echo "nop";
}

?>