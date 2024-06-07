<?php
include 'db_connect.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_siswa = $_POST['nama_siswa'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $sql = "UPDATE kehadiran_siswa
            SET nama_siswa='$nama_siswa', tanggal='$tanggal', status='$status'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM kehadiran_siswa WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Kehadiran</title>
</head>
<body>
    <h1>Edit Kehadiran Siswa</h1>
    <form method="POST" action="">
        <label>Nama Siswa:</label><br>
        <input type="text" name="nama_siswa" value="<?php echo $row['nama_siswa']; ?>" required><br>
        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" value="<?php echo $row['tanggal']; ?>" required><br>
        <label>Status:</label><br>
        <select name="status" required>
            <option value="Hadir" <?php if($row['status'] == 'Hadir') echo 'selected'; ?>>Hadir</option>
            <option value="Tidak Hadir" <?php if($row['status'] == 'Tidak Hadir') echo 'selected'; ?>>Tidak Hadir</option>
            <option value="Izin" <?php if($row['status'] == 'Izin') echo 'selected'; ?>>Izin</option>
            <option value="Sakit" <?php if($row['status'] == 'Sakit') echo 'selected'; ?>>Sakit</option>
        </select><br><br>
        <input type="submit" value="Update">
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>

<?php
$conn->close();
?>
