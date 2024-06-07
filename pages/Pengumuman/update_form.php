<?php
    include '../../includes/db_connect.php';
    
$id = $_POST['id'];
$sql = "SELECT * FROM pengumuman WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Pengumuman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        form {
            margin-bottom: 30px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
        }
        form input, form textarea, form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form input[type="submit"] {
            width: auto;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Update Pengumuman</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="judul">Judul:</label>
        <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($row['judul']); ?>" required><br><br>
        <label for="konten">Konten:</label><br>
        <textarea id="konten" name="konten" rows="4" cols="50" required><?php echo htmlspecialchars($row['konten']); ?></textarea><br><br>
        <label for="penulis">Penulis:</label>
        <input type="text" id="penulis" name="penulis" value="<?php echo htmlspecialchars($row['penulis']); ?>" required><br><br>
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>" required><br><br>
        <input type="submit" value="Update Pengumuman">
    </form>
</div>

</body>
</html>

<?php
} else {
    echo "Pengumuman tidak ditemukan.";
}

$conn->close();
?>
