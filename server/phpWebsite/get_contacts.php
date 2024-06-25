<?php
require "conn.php";
session_start();
$id = $_SESSION["id"];
$q = "SELECT id,name,number FROM Contacts WHERE id_user = $id";
$r = mysqli_query($conn,$q);

if(mysqli_num_rows($r)>0){
    $f=1;
    echo "
    <table class='table is-striped is-narrow is-hoverable is-fullwidth'>
    <thead>
        <tr>
        <th>Name</th>
        <th>number</th>
        <th></th>
            
        </tr>
        
    </thead>
    <tbody>
    ";
    while($arr = mysqli_fetch_array($r)){
        $a = $arr[1];
        $id = $arr[0];
        $number = $arr[2];
        echo "<tr>";
        echo "<th>$a</th>";
        echo "<th>$number</th>";
        echo "<th><button class='button is-medium is-danger is-rounded is-responsive' onclick='delete_contact($id)' data-target='modal-time'>
        <span class='icon'>
        <i class='fas fa-solid fa-trash'></i>
        </span>
    </button></th>";
        echo "</tr>";
    }
   
    echo "
    </tbody>
</table>
    ";
}else{
    echo "
    <table class='table is-striped is-narrow is-hoverable is-fullwidth'>
    <thead>
        <tr>
        <th>Name</th>
        <th>number</th>
            
        </tr>
        
    </thead>
    <tbody>
    
    </tbody>
</table>
    ";
}



?>