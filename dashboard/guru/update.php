<?php
  include '../../includes/db_connect.php';
  include '../../includes/session.php';

  $id = $_GET['updateId'];
  $sql = "select * from `guru` where id_guru='$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $nama = $row["nama"];
  $jenis_kelamin = $row["jenis_kelamin"];
  $tanggal_lahir = $row["tanggal_lahir"];
  $alamat = $row["alamat"];
  $mata_pelajaran = $row["mata_pelajaran"];
  $nomor_telepon = $row["nomor_telepon"];
  $email = $row["email"];

  if(isset($_POST['submit'])) {
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $alamat = $_POST["alamat"];
    $mata_pelajaran = $_POST["mata_pelajaran"];
    $nomor_telepon = $_POST["nomor_telepon"];
    $email = $_POST["email"];

    $sql = "update `guru` set nama='$nama', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', alamat='$alamat', mata_pelajaran='$mata_pelajaran', nomor_telepon='$nomor_telepon', email='$email' where id_guru='$id'";
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
    <title>Update Guru</title>
</head>
<body>
    
  <div class="shadow-lg max-w-sm mx-auto my-10 p-4 rounded-lg bg-white dark:bg-slate-900">
    <h1 class="font-bold text-lg text-center dark:text-white">Form Update Guru</h1>

    <form method="post">
      <div class="mb-6">
        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
        <input type="text" id="nama" name="nama" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Abdul Mutholib" required value="<?php echo $nama; ?>">
      </div>
      <div class="mb-6">
        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</p>
        <div class="flex">
            <div class="flex items-center me-4">
                <input id="jenis_kelamin_pria" type="radio" value="Laki-laki" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if($jenis_kelamin === "Laki-laki") echo " checked"; ?>>
                <label for="jenis_kelamin_pria" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pria</label>
            </div>
            <div class="flex items-center me-4">
                <input id="jenis_kelamin_wanita" type="radio" value="Perempuan" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if($jenis_kelamin === "Perempuan") echo " checked"; ?>>
                <label for="jenis_kelamin_wanita" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wanita</label>
            </div>
        </div>
      </div>
      <div class="mb-6">
        <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="<?php echo $tanggal_lahir; ?>">
      </div>
      <div class="mb-6">
        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
        <input type="text" id="alamat" name="alamat" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Kemiling" required value="<?php echo $alamat; ?>">
      </div>
      <div class="mb-6">
        <label for="mata_pelajaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Pelajaran</label>
        <input type="text" id="mata_pelajaran" name="mata_pelajaran" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ilmu Pengetahuan Alam" required value="<?php echo $mata_pelajaran; ?>">
      </div>
      <div class="mb-6">
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon</label>
        <input type="text" id="phone" name="nomor_telepon" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+628527777" required value="<?php echo $nomor_telepon; ?>">
      </div>
      <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" id="email" name="email" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@example.com" required value="<?php echo $email; ?>">
      </div>
      <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
    </form>
  </div>
</body>
</html>