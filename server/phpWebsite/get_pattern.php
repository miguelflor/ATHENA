<?php
require("conn.php");
session_start();
$id = $_SESSION["id"];

$q = "SELECT id,tag FROM intents WHERE id_user = $id AND tag REGEXP 'goodbyes|greet|new_note|questions|tell_time'";
$r = mysqli_query($conn, $q);

$id_r  = [];
$tag_r = [];

while($arr = mysqli_fetch_array($r)){

    
    array_push($id_r,$arr[0] );
    array_push($tag_r,$arr[1]);

}



$arr_tr = [];

$i = 0;
while($i < sizeof($id_r)){
    $id_intent = $id_r[$i];
    $i++;

    $q = "SELECT pattern,id FROM patterns_intent WHERE id_intent = $id_intent AND `add` = $id";
    $r = mysqli_query($conn,$q);
    $sub_arr = "";
    while($arr = mysqli_fetch_array($r)){
        $id_pattern = $arr[1];
        $pattern = $arr[0];
        $sub_arr = $sub_arr."<tr><th>$pattern</th>";
        $sub_arr = $sub_arr."<th><button class='button is-medium is-danger is-rounded is-responsive' onclick='delete_pattern($id_pattern)' data-target='modal-time'>
        <span class='icon'>
        <i class='fas fa-solid fa-trash'></i>
        </span>
    </button></th></tr>";
   
    }
    
    array_push($arr_tr,$sub_arr);
 

}

if(!$arr_tr){
    echo json_encode(["","","","",""]);
}else{
    echo json_encode($arr_tr);
}

?>