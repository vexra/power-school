<?php
    include '../../includes/db_connect.php';
    include '../../includes/session.php';

    $id = $_GET['updateId'];
    $sql = "select * from `jadwal_pelajaran` where id_jadwal='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $hari = $row['hari'];
    $jam_mulai = $row['jam_mulai'];
    $jam_selesai = $row['jam_selesai'];
    $id_kelas = $row['id_kelas'];
    $mata_pelajaran = $row['mata_pelajaran'];
    $id_guru = $row['id_guru'];

    if(isset($_POST['submit'])) {
      $hari = $_POST['hari'];
      $jam_mulai = $_POST['jam_mulai'];
      $jam_selesai = $_POST['jam_selesai'];
      $id_kelas = $_POST['id_kelas'];
      $mata_pelajaran = $_POST['mata_pelajaran'];
      $id_guru = $_POST['id_guru'];

      $sql = "update `jadwal_pelajaran` set hari='$hari', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai', id_kelas='$id_kelas', mata_pelajaran='$mata_pelajaran', id_guru='$id_guru' where id_jadwal='$id'";
      $result = mysqli_query($conn, $sql);

      if($result) {
        header('location:index.php');
      }
      else {
        die(mysqli_error($conn));
      }
    }
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
            <div class="mb-6">
                <label for="hari" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                <input type="text" id="hari" name="hari" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Hari" value="<?php echo $hari; ?>" required>
            </div>
            <div class="mb-6">
                <label for="id_kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                <select name="id_kelas" id="id_kelas" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" disabled>Pilih Kelas</option>
                    <?php
                    $sql_kelas = "SELECT id_kelas, nama_kelas FROM kelas";
                    $result_kelas = mysqli_query($conn, $sql_kelas);

                    while ($row_kelas = mysqli_fetch_assoc($result_kelas)) {
                        $selected = ($row_kelas['id_kelas'] == $id_kelas) ? 'selected' : ''; // Tandai opsi yang sesuai
                        echo "<option value='" . $row_kelas['id_kelas'] . "' $selected>" . $row_kelas['nama_kelas'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-6">
                <label for="mata_pelajaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Pelajaran</label>
                <input type="text" id="mata_pelajaran" name="mata_pelajaran" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Matematika" value="<?php echo $mata_pelajaran; ?>" required>
            </div>
            <div class="mb-6">
                <label for="jam_mulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Mulai</label>
                <input type="time" id="jam_mulai" name="jam_mulai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $jam_mulai; ?>" required>
            </div>
            <div class="mb-6">
                <label for="jam_selesai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Selesai</label>
                <input type="time" id="jam_selesai" name="jam_selesai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $jam_selesai; ?>" required>
            </div>
            <div class="mb-6">
                <label for="id_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guru</label>
                <select name="id_guru" id="id_guru" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" disabled>Pilih Guru</option>
                    <?php
                    $sql_guru = "SELECT id_guru, nama FROM guru";
                    $result_guru = mysqli_query($conn, $sql_guru);

                    while ($row_guru = mysqli_fetch_assoc($result_guru)) {
                        $selected = ($row_guru['id_guru'] == $id_guru) ? 'selected' : ''; // Tandai opsi yang sesuai
                        echo "<option value='" . $row_guru['id_guru'] . "' $selected>" . $row_guru['nama'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
        </form>
    </div>
</body>
</html>
