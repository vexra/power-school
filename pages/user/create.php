<?php
include '../../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $hak_akses = $_POST['hak_akses'];

    $sql = "INSERT INTO user (username, password, hak_akses) VALUES ('$username', '$password', '$hak_akses')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tambah User</title>
</head>
<body class="bg-gray-100">
    <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Tambah User</h1>
        <form method="post" action="create.php">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username:</label>
                <input type="text" id="username" name="username" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password:</label>
                <input type="password" id="password" name="password" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="hak_akses" class="block text-gray-700">Hak Akses:</label>
                <select id="hak_akses" name="hak_akses" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-indigo-500">
                    <option value="Admin">Admin</option>
                    <option value="Guru">Guru</option>
                    <option value="Siswa">Siswa</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">Tambah User</button>
        </form>
    </div>
</body>
</html>
