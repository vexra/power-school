<?php
    include '../../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $penulis = $_POST['penulis'];
    $tanggal = $_POST['tanggal'];

    $sql = "UPDATE pengumuman SET judul='$judul', konten='$konten', penulis='$penulis', tanggal='$tanggal' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Pengumuman berhasil diupdate.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
header("Location: index.php");
?>
