<?php
require "conn.php";
session_start();
$id = $_SESSION["id"];
$q = "SELECT id, name, number FROM Contacts WHERE id_user = ?";
$stmt = $conn->prepare($q);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $name, $number);
    echo "
    <table class='table is-striped is-narrow is-hoverable is-fullwidth'>
    <thead>
        <tr>
        <th>Name</th>
        <th>Number</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
    ";
    while ($stmt->fetch()) {
        echo "<tr>";
        echo "<th>$name</th>";
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
} else {
    echo "
    <table class='table is-striped is-narrow is-hoverable is-fullwidth'>
    <thead>
        <tr>
        <th>Name</th>
        <th>Number</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
    ";
}
?>