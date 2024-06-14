<?php
    include '../../includes/db_connect.php';
    include '../../includes/session.php';

    $id_nilai = $_GET["updateId"];
    $sql = "SELECT * FROM nilai_siswa WHERE id_nilai=$id_nilai";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $id_siswa = $row["id_siswa"];
    $mata_pelajaran = $row["mata_pelajaran"];
    $nilai = $row["nilai"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mata_pelajaran = $_POST["mata_pelajaran"];
        $nilai = $_POST["nilai"];

        $sql = "UPDATE nilai_siswa SET id_siswa='$id_siswa', mata_pelajaran='$mata_pelajaran', nilai='$nilai' WHERE id_nilai=$id_nilai";
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
    <title>Edit Nilai</title>
</head>
<body>
    <div class="max-w-5xl mx-auto my-10 p-4 rounded-lg bg-white shadow-lg">
        <h2 class="text-2xl font-bold mb-6">Edit Nilai Siswa</h2>
        <form method="post">
            <div class="mb-4">
                <label for="mata_pelajaran" class="block text-gray-700">Mata Pelajaran</label>
                <input type="text" name="mata_pelajaran" id="mata_pelajaran" value="<?php echo $mata_pelajaran; ?>" required class="mt-2 p-2 border border-gray-300 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="nilai" class="block text-gray-700">Nilai</label>
                <input type="number" step="0.01" name="nilai" id="nilai" value="<?php echo $nilai; ?>" required class="mt-2 p-2 border border-gray-300 rounded w-full">
            </div>
            <button type="submit" class="py-2 px-4 bg-blue-600 hover:bg-blue-500 text-white rounded">Update</button>
        </form>
    </div>
</body>
</html>
