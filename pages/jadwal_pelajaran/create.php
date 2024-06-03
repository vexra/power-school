<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pelajaran = $_POST['nama_pelajaran'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $guru_pengampu = $_POST['guru_pengampu'];

    $sql = "INSERT INTO jadwal_pelajaran (nama_pelajaran, hari, jam_mulai, jam_selesai, guru_pengampu)
            VALUES ('$nama_pelajaran', '$hari', '$jam_mulai', '$jam_selesai', '$guru_pengampu')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jadwal</title>
</head>
<body>
    <h1>Tambah Jadwal Pelajaran</h1>
    <form method="POST" action="">
        <label>Nama Pelajaran:</label><br>
        <input type="text" name="nama_pelajaran" required><br>
        <label>Hari:</label><br>
        <input type="text" name="hari" required><br>
        <label>Jam Mulai:</label><br>
        <input type="time" name="jam_mulai" required><br>
        <label>Jam Selesai:</label><br>
        <input type="time" name="jam_selesai" required><br>
        <label>Guru Pengampu:</label><br>
        <input type="text" name="guru_pengampu" required><br><br>
        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>

<?php
$conn->close();
?>
