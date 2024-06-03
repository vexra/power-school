<?php
include 'db_connect.php';

// Fetch data from database
$sql = "SELECT * FROM jadwal_pelajaran";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Pelajaran</title>
</head>
<body>
    <h1>Jadwal Pelajaran</h1>
    <a href="create.php">Tambah Jadwal</a>
    <table border="1">
        <tr>
            <th>Nama Pelajaran</th>
            <th>Hari</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Guru Pengampu</th>
            <th>Aksi</th>
        </tr>
        <?php if ($result->num_rows > 0) : ?>
            <?php while($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['nama_pelajaran']; ?></td>
                    <td><?php echo $row['hari']; ?></td>
                    <td><?php echo $row['jam_mulai']; ?></td>
                    <td><?php echo $row['jam_selesai']; ?></td>
                    <td><?php echo $row['guru_pengampu']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan="6">Tidak ada data jadwal pelajaran.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
