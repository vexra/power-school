<?php
  include '../../includes/db_connect.php';
  include '../../includes/session.php';

  $id = $_GET['updateId'];
  $sql = "select * from `kelas` where id_kelas='$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $nama_kelas = $row["nama_kelas"];
  $tingkat_kelas = $row["tingkat_kelas"];
  $wali_kelas = $row["wali_kelas"];
  $informasi_tambahan = $row["informasi_tambahan"];

  if(isset($_POST['submit'])) {
    $nama_kelas = $_POST["nama_kelas"];
    $tingkat_kelas = $_POST["tingkat_kelas"];
    $wali_kelas = $_POST["wali_kelas"];
    $informasi_tambahan = $_POST["informasi_tambahan"];

    $sql = "update `kelas` set nama_kelas='$nama_kelas', tingkat_kelas='$tingkat_kelas', wali_kelas='$wali_kelas', informasi_tambahan='$informasi_tambahan' where id_kelas='$id'";
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
    <title>Update Kelas</title>
</head>
<body>
    
  <div class="shadow-lg max-w-sm mx-auto my-10 p-4 rounded-lg bg-white dark:bg-slate-900">
    <h1 class="font-bold text-lg text-center dark:text-white">Form Update Kelas</h1>

    <form method="post">
      <div class="mb-6">
        <label for="nama_kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kelas</label>
        <input type="text" id="nama_kelas" name="nama_kelas" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="A" required value="<?php echo $nama_kelas; ?>">
      </div>
      <div class="mb-6">
        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tingkat Kelas</p>
        <div class="flex">
            <div class="flex items-center me-4">
                <input id="tingkat_kelas_sd" type="radio" value="SD" name="tingkat_kelas" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if($tingkat_kelas === "SD") echo " checked"; ?>>
                <label for="tingkat_kelas_sd" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">SD</label>
            </div>
            <div class="flex items-center me-4">
                <input id="tingkat_kelas_smp" type="radio" value="SMP" name="tingkat_kelas" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if($tingkat_kelas === "SMP") echo " checked"; ?>>
                <label for="tingkat_kelas_smp" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">SMP</label>
            </div>
            <div class="flex items-center me-4">
                <input id="tingkat_kelas_sma" type="radio" value="SMA" name="tingkat_kelas" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if($tingkat_kelas === "SMA") echo " checked"; ?>>
                <label for="tingkat_kelas_sma" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">SMA</label>
            </div>
        </div>
      </div>
      <div>
        <label for="wali_kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wali Kelas</label>
          <select id="wali_kelas" name="wali_kelas" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected disabled>Pilih wali kelas</option>
            <?php
              $sql_guru = "select * from `guru`";
              $result_guru = mysqli_query($conn, $sql_guru);

              while($row_guru = mysqli_fetch_assoc($result_guru)) {
                $selected = ($row_guru['id_guru'] == $wali_kelas) ? "selected" : "";
                echo "<option value='" . $row_guru['id_guru'] . "' $selected>" . $row_guru['nama'] . "</option>";
              }
            ?>
          </select>
      </div>
      <div class="mb-6">
        <label for="informasi_tambahan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Informasi Tambahan</label>
        <input type="text" id="informasi_tambahan" name="informasi_tambahan" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." value="<?php echo $informasi_tambahan; ?>">
      </div>
      <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
    </form>
  </div>
</body>
</html>