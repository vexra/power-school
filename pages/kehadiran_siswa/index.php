<?php
include '../../includes/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Daftar Kehadiran Siswa</title>
</head>
<body>
    <div class="shadow-lg max-w-5xl mx-auto my-10 p-4 rounded-lg bg-white dark:bg-slate-900">
        <a href="create.php" class="py-2 px-4 rounded-lg text-gray-900 dark:text-white bg-green-400 hover:bg-green-500">Tambah Kehadiran</a>
        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID Siswa</th>
                        <th scope="col" class="px-6 py-3">Nama Siswa</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">Status Kehadiran</th>
                        <th scope="col" class="px-6 py-3"><span class="sr-only">Aksi</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT ks.id, ks.id_siswa, s.nama AS nama_siswa, ks.tanggal, ks.status_kehadiran 
                            FROM kehadiran_siswa ks
                            INNER JOIN siswa s ON ks.id_siswa = s.id_siswa";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row["id"];
                            $id_siswa = $row["id_siswa"];
                            $nama_siswa = $row["nama_siswa"];
                            $tanggal = $row["tanggal"];
                            $status_kehadiran = $row["status_kehadiran"];

                            echo '
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        '.$id_siswa.'
                                    </th>
                                    <td class="px-6 py-4">'.$nama_siswa.'</td>
                                    <td class="px-6 py-4">'.$tanggal.'</td>
                                    <td class="px-6 py-4">'.$status_kehadiran.'</td>
                                    <td class="px-6 py-4 flex items-center justify-center gap-2">
                                        <a href="update.php?id='.$id.'" class="px-4 py-2 bg-blue-600 hover:bg-blue-500 dark:bg-blue-500 hover:bg-blue-600 rounded-lg text-white font-medium">Edit</a>
                                        <a href="delete.php?id='.$id.'" class="px-4 py-2 bg-red-600 hover:bg-red-500 dark:bg-red-500 hover:bg-red-600 rounded-lg text-white font-medium" onclick="return confirm(\'Anda yakin ingin menghapus kehadiran ini?\')">Delete</a>
                                    </td>
                                </tr>
                            ';
                        }
                    } else {
                        echo '
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-red-500">Tidak ada data kehadiran siswa.</td>
                            </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
