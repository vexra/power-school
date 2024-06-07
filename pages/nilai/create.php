<?php
    include '../../includes/db_connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_siswa = $_POST["id_siswa"];
        $mata_pelajaran = $_POST["mata_pelajaran"];
        $nilai = $_POST["nilai"];

        $sql = "INSERT INTO nilai_siswa (id_siswa, mata_pelajaran, nilai) VALUES ('$id_siswa', '$mata_pelajaran', '$nilai')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tambah Nilai</title>
</head>
<body>
    <div class="max-w-5xl mx-auto my-10 p-4 rounded-lg bg-white shadow-lg">
        <h2 class="text-2xl font-bold mb-6">Tambah Nilai Siswa</h2>
        <form method="post">
            <div class="mb-4">
                <label for="id_siswa" class="block text-gray-700">Siswa</label>
                <select name="id_siswa" id="id_siswa" required class="mt-2 p-2 bg-white border border-gray-300 rounded w-full">
                    <option value="" disabled selected>Pilih Siswa</option>
                    <?php
                    $sql_siswa = "SELECT id_siswa, nama FROM siswa";
                    $result_siswa = mysqli_query($conn, $sql_siswa);

                    while ($row_siswa = mysqli_fetch_assoc($result_siswa)) {
                        echo "<option value='" . $row_siswa['id_siswa'] . "'>" . $row_siswa['nama'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="mata_pelajaran" class="block text-gray-700">Mata Pelajaran</label>
                <input type="text" name="mata_pelajaran" id="mata_pelajaran" required class="mt-2 p-2 border border-gray-300 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="nilai" class="block text-gray-700">Nilai</label>
                <input type="number" step="0.01" name="nilai" id="nilai" required class="mt-2 p-2 border border-gray-300 rounded w-full">
            </div>
            <button type="submit" class="py-2 px-4 bg-blue-600 hover:bg-blue-500 text-white rounded">Simpan</button>
        </form>
    </div>
</body>
</html>

