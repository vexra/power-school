<?php
    include '../../includes/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tabel Jadwal Pelajaran</title>
</head>
<body>
    <div class="shadow-lg max-w-5xl mx-auto my-10 p-4 rounded-lg bg-white dark:bg-slate-900 border border-gray-300">
        <a href="create.php" class="py-2 px-4 rounded-lg bg text-gray-900 dark:text-white bg-green-400 hover:bg-green-500">Tambah Jadwal</a>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Id</th>
                        <th scope="col" class="px-6 py-3">Nama Pelajaran</th>
                        <th scope="col" class="px-6 py-3">Guru</th>
                        <th scope="col" class="px-6 py-3">Hari</th>
                        <th scope="col" class="px-6 py-3">Jam Mulai</th>
                        <th scope="col" class="px-6 py-3">Jam Selesai</th>
                        <th scope="col" class="px-6 py-3">Ruang</th>
                        <th scope="col" class="px-6 py-3"><span class="sr-only">Edit</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT jp.*, g.nama AS nama_guru FROM `jadwal_pelajaran` jp JOIN `guru` g ON jp.guru_id = g.id_guru";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $id_jadwal = $row["id_jadwal"];
                                $nama_pelajaran = $row["nama_pelajaran"];
                                $nama_guru = $row["nama_guru"];
                                $hari = $row["hari"];
                                $jam_mulai = $row["jam_mulai"];
                                $jam_selesai = $row["jam_selesai"];
                                $ruang = $row["ruang"];

                                echo '
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            '.$id_jadwal.'
                                        </th>
                                        <td class="px-6 py-4">'.$nama_pelajaran.'</td>
                                        <td class="px-6 py-4">'.$nama_guru.'</td>
                                        <td class="px-6 py-4">'.$hari.'</td>
                                        <td class="px-6 py-4">'.$jam_mulai.'</td>
                                        <td class="px-6 py-4">'.$jam_selesai.'</td>
                                        <td class="px-6 py-4">'.$ruang.'</td>
                                        <td class="px-6 py-4 flex items-center justify-center gap-2">
                                            <a href="update.php?updateId='.$id_jadwal.'" class="px-4 py-2 bg-blue-600 hover:bg-blue-500 dark:bg-blue-500 hover:bg-blue-600 rounded-lg text-white font-medium">Edit</a>
                                            <a href="delete.php?deleteId='.$id_jadwal.'" class="px-4 py-2 bg-red-600 hover:bg-red-500 dark:bg-red-500 hover:bg-red-600 rounded-lg text-white font-medium">Delete</a>
                                        </td>
                                    </tr>
                                ';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
