<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_siswa = $_POST['nama_siswa'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $sql = "INSERT INTO kehadiran_siswa (nama_siswa, tanggal, status)
            VALUES ('$nama_siswa', '$tanggal', '$status')";

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
    <title>Tambah Kehadiran</title>
</head>
<body>
    <h1>Tambah Kehadiran Siswa</h1>
    <form method="POST" action="">
        <label>Nama Siswa:</label><br>
        <input type="text" name="nama_siswa" required><br>
        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" required><br>
        <label>Status:</label><br>
        <select name="status" required>
            <option value="Hadir">Hadir</option>
            <option value="Tidak Hadir">Tidak Hadir</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
        </select><br><br>
        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>

<?php
$conn->close();
?>
