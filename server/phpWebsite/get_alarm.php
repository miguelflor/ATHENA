<?php
include("conn.php");
session_start();
$id = $_SESSION["id"];
$q = "SELECT alarme,id FROM Alarms WHERE id_user = $id";
$r = mysqli_query($conn, $q);


$f = 0;
if(mysqli_num_rows($r)>0){
    $f=1;
    echo "
    <table class='table is-striped is-narrow is-hoverable is-fullwidth'>
    <thead>
        <tr>
        <th>Alarms</th>
        <th></th>
            
        </tr>
        
    </thead>
    <tbody>
    ";
    while($arr = mysqli_fetch_array($r)){
        $a = $arr[0];
        $id = $arr[1];
        echo "<tr>";
        echo "<th>$a</th>";
        echo "<th><button class='button is-medium is-danger is-rounded is-responsive' onclick='delete_alarm($id)' data-target='modal-time'>
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
        <th>Alarms</th>
        <th></th>
            
        </tr>
        
    </thead>
    <tbody>
    
    </tbody>
</table>
    ";
}



?>