<?php
include ("conn.php");
session_start();
$id = $_SESSION["id"];
$q = "SELECT notas, id FROM Notes WHERE id_user = ?";
$stmt = $conn->prepare($q);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($note, $noteId);
    echo "
    <table class='table is-striped is-narrow is-hoverable is-fullwidth'>
    <thead>
        <tr>
        <th>Notes</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
    ";
    while ($stmt->fetch()) {
        echo "<tr>";
        echo "<td>$note</td>";
        echo "<td><button class='button is-medium is-danger is-rounded is-responsive' onclick='delete_note($noteId)' data-target='modal-time'>
        <span class='icon'>
        <i class='fas fa-solid fa-trash'></i>
        </span>
    </button></td>";
        echo "</tr>";
    }
    echo "
    </tbody>
</table>
    ";
} else {
    echo "No notes found.";
}
$stmt->close();

?>