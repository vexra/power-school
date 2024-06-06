<?php
include '../../includes/db_connect.php';

$id_jadwal = $_GET['id']; // Menggunakan 'id' sesuai dengan nama parameter di URL

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $id_guru = $_POST['id_guru'];

    $sql = "UPDATE jadwal_pelajaran
            SET mata_pelajaran='$mata_pelajaran', hari='$hari', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai', id_guru='$id_guru'
            WHERE id_jadwal=$id_jadwal"; // Menggunakan $id_jadwal dalam query UPDATE

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM jadwal_pelajaran WHERE id_jadwal=$id_jadwal"; // Menggunakan $id_jadwal dalam query SELECT
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
        <label>Mata Pelajaran:</label><br>
        <input type="text" name="mata_pelajaran" value="<?php echo $row['mata_pelajaran']; ?>" required><br>
        <label>Hari:</label><br>
        <input type="text" name="hari" value="<?php echo $row['hari']; ?>" required><br>
        <label>Jam Mulai:</label><br>
        <input type="time" name="jam_mulai" value="<?php echo $row['jam_mulai']; ?>" required><br>
        <label>Jam Selesai:</label><br>
        <input type="time" name="jam_selesai" value="<?php echo $row['jam_selesai']; ?>" required><br>
        <label>Guru Pengampu:</label><br>
        <input type="number" name="id_guru" value="<?php echo $row['id_guru']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>

<?php
$conn->close();
?>
