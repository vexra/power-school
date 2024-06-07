<?php
include 'db_connect.php';

// Fetch data from database
$sql = "SELECT * FROM kehadiran_siswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kehadiran Siswa</title>
</head>
<body>
    <h1>Kehadiran Siswa</h1>
    <a href="create.php">Tambah Kehadiran</a>
    <table border="1">
        <tr>
            <th>Nama Siswa</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php if ($result->num_rows > 0) : ?>
            <?php while($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['nama
