<?php
include '../../includes/db_connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM jadwal_pelajaran WHERE id_jadwal=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
