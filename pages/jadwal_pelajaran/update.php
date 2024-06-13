<?php
include '../../includes/db_connect.php';

$id_jadwal = $_GET['updateId'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pelajaran = $_POST['nama_pelajaran'];
    $guru_id = $_POST['guru_id'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $ruang = $_POST['ruang'];

    $sql = "UPDATE `jadwal_pelajaran` SET nama_pelajaran='$nama_pelajaran', guru_id='$guru_id', hari='$hari', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai', ruang='$ruang' WHERE id_jadwal='$id_jadwal'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: index.php");
    } else {
        die(mysqli_error($conn));
    }
}

$sql = "SELECT * FROM `jadwal_pelajaran` WHERE id_jadwal='$id_jadwal'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Jadwal Pelajaran</title>
</head>
<body>
    <div class="max-w-lg mx-auto my-10 p-4 rounded-lg bg-white dark:bg-slate-900">
        <form method="POST">
            <div class="mb-4">
                <label for="nama_pelajaran" class="block text-gray-700 dark:text-gray-400">Nama Pelajaran</label>
                <input type="text" name="nama_pelajaran" id="nama_pelajaran" class="mt-1 block w-full" value="<?php echo $row['nama_pelajaran']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="guru_id" class="block text-gray-700 dark:text-gray-400">Guru</label>
                <select name="guru_id" id="guru_id" class="mt-1 block w-full" required>
                    <?php
                    $sql_guru = "SELECT * FROM `guru`";
                    $result_guru = mysqli_query($conn, $sql_guru);
                    if ($result_guru) {
                        while ($guru = mysqli_fetch_assoc($result_guru)) {
                            $selected = $guru['id_guru'] == $row['guru_id'] ? 'selected' : '';
                            echo '<option value="'.$guru['id_guru'].'" '.$selected.'>'.$guru['nama'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="hari" class="block text-gray-700 dark:text-gray-400">Hari</label>
                <input type="text" name="hari" id="hari" class="mt-1 block w-full" value="<?php echo $row['hari']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="jam_mulai" class="block text-gray-700 dark:text-gray-400">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" class="mt-1 block w-full" value="<?php echo $row['jam_mulai']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="jam_selesai" class="block text-gray-700 dark:text-gray-400">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" class="mt-1 block w-full" value="<?php echo $row['jam_selesai']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="ruang" class="block text-gray-700 dark:text-gray-400">Ruang</label>
                <input type="text" name="ruang" id="ruang" class="mt-1 block w-full" value="<?php echo $row['ruang']; ?>" required>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-500 dark:bg-blue-500 hover:bg-blue-600 rounded-lg text-white font-medium">Update</button>
        </form>
    </div>
</body>
</html>
