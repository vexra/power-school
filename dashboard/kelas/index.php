<?php
    include '../../includes/db_connect.php';
    include '../../includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tabel Kelas</title>
</head>
<body>
    <main class="flex items-start justify-center">
        <?php
            include '../../templates/sidebar.php'
        ?>
        <div class="shadow-lg max-w-5xl mx-auto my-10 p-4 rounded-lg bg-white dark:bg-slate-900">
            <a href="create.php" class="py-2 px-4 rounded-lg bg text-gray-900 dark:text-white bg-green-400 hover:bg-green-500">Tambah Kelas</a>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Kelas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tingkat Kelas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Wali Kelas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Informasi Tambahan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT kelas.*, guru.nama AS nama_wali_kelas FROM kelas LEFT JOIN guru ON kelas.wali_kelas = guru.id_guru";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $id_kelas = $row["id_kelas"];
                                    $nama_kelas = $row["nama_kelas"];
                                    $tingkat_kelas = $row["tingkat_kelas"];
                                    $wali_kelas = $row["wali_kelas"];
                                    $nama_wali_kelas = $row["nama_wali_kelas"];
                                    $informasi_tambahan = $row["informasi_tambahan"];

                                    echo '
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                '.$id_kelas.'
                                            </th>
                                            <td class="px-6 py-4">
                                                '.$nama_kelas.'
                                            </td>
                                            <td class="px-6 py-4">
                                                '.$tingkat_kelas.'
                                            </td>
                                            <td class="px-6 py-4">
                                                '.$nama_wali_kelas.'
                                            </td>
                                            <td class="px-6 py-4">
                                                '.$informasi_tambahan.'
                                            </td>
                                            <td class="px-6 py-4 flex items-center justify-center gap-2">
                                                <a href="update.php?updateId='.$id_kelas.'" class="px-4 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg text-white font-medium">
                                                    Edit
                                                </a>
                                                <a href="delete.php?deleteId='.$id_kelas.'" class="px-4 py-2 bg-red-600 hover:bg-red-500 rounded-lg text-white font-medium">
                                                    Delete
                                                </a>
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
    </main>
</body>
</html>