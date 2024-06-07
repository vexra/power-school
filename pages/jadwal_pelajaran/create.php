<?php
include '../../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $id_guru = $_POST['id_guru'];

    // Memeriksa apakah ID Guru yang dimasukkan ada di database
    $check_query = "SELECT id_guru FROM guru WHERE id_guru = ?";
    $stmt_check = $conn->prepare($check_query);
    $stmt_check->bind_param("i", $id_guru);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    $row_count = $result_check->num_rows;
    $stmt_check->close();

    if ($row_count > 0) {
        // ID Guru valid, lanjutkan dengan penyimpanan jadwal pelajaran
        $sql = "INSERT INTO jadwal_pelajaran (mata_pelajaran, hari, jam_mulai, jam_selesai, id_guru)
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $mata_pelajaran, $hari, $jam_mulai, $jam_selesai, $id_guru);

        if ($stmt->execute()) {
            header('Location: index.php');
            exit; // Pastikan untuk keluar dari skrip setelah melakukan pengalihan
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "ID Guru tidak valid. Silakan masukkan ID Guru yang valid.";
    }
}

$conn->close();
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
        <input type="text" name="mata_pelajaran" required><br>
        <label>Hari:</label><br>
        <input type="text" name="hari" required><br>
        <label>Jam Mulai:</label><br>
        <input type="time" name="jam_mulai" required><br>
        <label>Jam Selesai:</label><br>
        <input type="time" name="jam_selesai" required><br>
        <label>Guru Pengampu (ID):</label><br>
        <input type="number" name="id_guru" required><br><br>
        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>
