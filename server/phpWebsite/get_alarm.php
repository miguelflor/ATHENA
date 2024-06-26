<?php
include ("conn.php");
session_start();
$id = $_SESSION["id"];
$q = "SELECT alarme,id FROM Alarms WHERE id_user = ?";
$stmt = $conn->prepare($q);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();

$f = 0;
if ($stmt->num_rows > 0) {
    $stmt->bind_result($alarm, $id);
    $f = 1;
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
    while ($stmt->fetch()) {
        echo "<tr>";
        echo "<th>$alarm</th>";
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
} else {
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

$stmt->close();

?>