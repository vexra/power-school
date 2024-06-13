<?php
include '../../includes/db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_siswa = $_POST['id_siswa'];
        $tanggal = $_POST['tanggal'];
        $status_kehadiran = $_POST['status_kehadiran'];

        $sql = "UPDATE kehadiran_siswa SET id_siswa='$id_siswa', tanggal='$tanggal', status_kehadiran='$status_kehadiran' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        $sql = "SELECT * FROM kehadiran_siswa WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Kehadiran Siswa</title>
</head>
<body>
    <div class="shadow-lg max-w-5xl mx-auto my-10 p-4 rounded-lg bg-white dark:bg-slate-900">
        <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Edit Kehadiran Siswa</h2>
        <form action="update.php?id=<?php echo $id; ?>" method="post" class="space-y-4">
            <div>
                <label for="id_siswa" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID Siswa</label>
                <input type="text" name="id_siswa" id="id_siswa" value="<?php echo $row['id_siswa']; ?>" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-700">
            </div>
            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="<?php echo $row['tanggal']; ?>" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-700">
            </div>
            <div>
                <label for="status_kehadiran" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status Kehadiran</label>
                <select name="status_kehadiran" id="status_kehadiran" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-700">
                    <option value="Hadir" <?php if ($row['status_kehadiran'] == 'Hadir') echo 'selected'; ?>>Hadir</option>
                    <option value="Tidak Hadir" <?php if ($row['status_kehadiran'] == 'Tidak Hadir') echo 'selected'; ?>>Tidak Hadir</option>
                    <option value="Izin" <?php if ($row['status_kehadiran'] == 'Izin') echo 'selected'; ?>>Izin</option>
                    <option value="Sakit" <?php if ($row['status_kehadiran'] == 'Sakit') echo 'selected'; ?>>Sakit</option>
                </select>
            </div>
            <button type="submit" class="py-2 px-4 bg-blue-600 hover:bg-blue-500 text-white rounded-lg">Simpan</button>
        </form>
    </div>
</body>
</html>
