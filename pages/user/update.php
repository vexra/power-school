<?php
    include '../../includes/db_connect.php';
    include '../../includes/session.php';

    $error = ""; // Variable to store error messages
    $success = ""; // Variable to store success message

    if (isset($_GET['updateId'])) {
        $id_user = $_GET['updateId'];
        $sql = "SELECT * FROM user WHERE id_user=$id_user";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $username = $row['username'];
        $hak_akses = $row['hak_akses'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hak_akses = $_POST['hak_akses'];

        if (empty($password)) {
            $sql = "UPDATE user SET username='$username', hak_akses='$hak_akses' WHERE id_user=$id_user";
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE user SET username='$username', password='$password', hak_akses='$hak_akses' WHERE id_user=$id_user";
        }

        if ($conn->query($sql) === TRUE) {
            $success = "User updated successfully.";
            header("Location: index.php");
        } else {
            $error = "Error updating user: " . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update User</title>
</head>
<body class="bg-gray-100">
    <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Update User</h1>
        <?php if ($error): ?>
            <div class="text-red-500 mb-4"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="text-green-500 mb-4"><?php echo $success; ?></div>
        <?php endif; ?>
        <form method="post" action="update.php">
            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password (kosongkan jika tidak ingin mengubah):</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="hak_akses" class="block text-gray-700">Hak Akses:</label>
                <select id="hak_akses" name="hak_akses" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-indigo-500">
                    <option value="Admin" <?php if ($hak_akses == 'Admin') echo 'selected'; ?>>Admin</option>
                    <option value="Guru" <?php if ($hak_akses == 'Guru') echo 'selected'; ?>>Guru</option>
                    <option value="Siswa" <?php if ($hak_akses == 'Siswa') echo 'selected'; ?>>Siswa</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">Update User</button>
        </form>
    </div>
</body>
</html>
