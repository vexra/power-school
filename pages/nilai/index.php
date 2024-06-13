<?php
    include '../../includes/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Nilai Siswa</title>
</head>
<body>
    <div class="shadow-lg max-w-5xl mx-auto my-10 p-4 rounded-lg bg-white">
        <a href="create.php" class="py-2 px-4 rounded-lg bg-green-400 hover:bg-green-500 text-white">Tambah Nilai</a>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>n
                        <th scope="col" class="px-6 py-3">Id Nilai</th>
                        <th scope="col" class="px-6 py-3">Id Siswa</th>
                        <th scope="col" class="px-6 py-3">Mata Pelajaran</th>
                        <th scope="col" class="px-6 py-3">Nilai</th>
                        <th scope="col" class="px-6 py-3"><span class="sr-only">Edit</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM nilai_siswa";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $id_nilai = $row["id_nilai"];
                                $id_siswa = $row["id_siswa"];
                                $mata_pelajaran = $row["mata_pelajaran"];
                                $nilai = $row["nilai"];

                                echo '
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">'.$id_nilai.'</th>
                                        <td class="px-6 py-4">'.$id_siswa.'</td>
                                        <td class="px-6 py-4">'.$mata_pelajaran.'</td>
                                        <td class="px-6 py-4">'.$nilai.'</td>
                                        <td class="px-6 py-4 flex items-center justify-center gap-2">
                                            <a href="update.php?updateId='.$id_nilai.'" class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded">Edit</a>
                                            <a href="delete.php?deleteId='.$id_nilai.'" class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white rounded">Delete</a>
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
