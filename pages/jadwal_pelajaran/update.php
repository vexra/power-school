<?php
include '../../includes/db_connect.php';

$id_jadwal = isset($_GET['id']) ? intval($_GET['id']) : 0; // Memastikan 'id' ada dan merupakan angka valid

if ($id_jadwal <= 0) {
    die("ID Jadwal tidak valid.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $id_guru = $_POST['id_guru'];

    $sql = "UPDATE jadwal_pelajaran
            SET mata_pelajaran=?, hari=?, jam_mulai=?, jam_selesai=?, id_guru=?
            WHERE id_jadwal=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssii", $mata_pelajaran, $hari, $jam_mulai, $jam_selesai, $id_guru, $id_jadwal);

    if ($stmt->execute()) {
        header('Location: index.php');
        exit; // Pastikan untuk keluar dari skrip setelah melakukan pengalihan
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
} else {
    $sql = "SELECT * FROM jadwal_pelajaran WHERE id_jadwal=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_jadwal);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        die("Jadwal tidak ditemukan.");
    }

    $row = $result->fetch_assoc();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Jadwal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #343a40;
            text-align: center;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #343a40;
        }
        input[type="text"],
        input[type="time"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Jadwal Pelajaran</h1>
        <form method="POST" action="">
            <label>Mata Pelajaran:</label>
            <input type="text" name="mata_pelajaran" value="<?php echo htmlspecialchars($row['mata_pelajaran']); ?>" required>
            <label>Hari:</label>
            <input type="text" name="hari" value="<?php echo htmlspecialchars($row['hari']); ?>" required>
            <label>Jam Mulai:</label>
            <input type="time" name="jam_mulai" value="<?php echo htmlspecialchars($row['jam_mulai']); ?>" required>
            <label>Jam Selesai:</label>
            <input type="time" name="jam_selesai" value="<?php echo htmlspecialchars($row['jam_selesai']); ?>" required>
            <label>Guru Pengampu:</label>
            <input type="number" name="id_guru" value="<?php echo htmlspecialchars($row['id_guru']); ?>" required>
            <input type="submit" value="Update">
        </form>
        <a class="back-link" href="index.php">Kembali</a>
    </div>
</body>
</html>
