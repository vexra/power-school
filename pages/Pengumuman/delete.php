<?php
    include '../../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM pengumuman WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Pengumuman berhasil dihapus.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
header("Location: index.php");
?>
