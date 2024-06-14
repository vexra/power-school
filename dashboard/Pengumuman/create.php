<?php
    include '../../includes/db_connect.php';
    include '../../includes/session.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $judul = $_POST['judul'];
        $konten = $_POST['konten'];
        $penulis = $_POST['penulis'];
        $tanggal = $_POST['tanggal'];

        $sql = "INSERT INTO pengumuman (judul, konten, penulis, tanggal) VALUES ('$judul', '$konten', '$penulis', '$tanggal')";

        if ($conn->query($sql) === TRUE) {
            echo "Pengumuman berhasil ditambahkan.";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
    header("Location: index.php");
?>
