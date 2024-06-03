<?php
include 'db_connect.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pelajaran = $_POST['nama_pelajaran'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $guru_pengampu = $_POST['guru_pengampu'];

    $sql = "UPDATE jadwal_pelajaran
            SET nama_pelajaran='$nama_pelajaran', hari='$hari', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai', guru_pengampu='$guru_pengampu'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM jadwal_pelajaran WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Jadwal</title>
</head>
<body>
    <h1>Edit Jadwal Pelajaran</h1>
    <form method="POST" action="">
        <label>Nama Pelajaran:</label><br>
        <input type="text" name="nama_pelajaran" value="<?php echo $row['nama_pelajaran']; ?>" required><br>
        <label>Hari:</label><br>
        <input type="text" name="hari" value="<?php echo $row['hari']; ?>" required><br>
        <label>Jam Mulai:</label><br>
        <input type="time" name="jam_mulai" value="<?php echo $row['jam_mulai']; ?>" required><br>
        <label>Jam Selesai:</label><br>
        <input type="time" name="jam_selesai" value="<?php echo $row['jam_selesai']; ?>" required><br>
        <label>Guru Pengampu:</label><br>
        <input type="text" name="guru_pengampu" value="<?php echo $row['guru_pengampu']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>

<?php
$conn->close();
?>
