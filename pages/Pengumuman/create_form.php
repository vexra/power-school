<?php
    include '../../includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pengumuman Baru</title>
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
    <h1>Tambah Pengumuman Baru</h1>
    <form action="create.php" method="post">
        <label for="judul">Judul:</label>
        <input type="text" id="judul" name="judul" required><br><br>
        <label for="konten">Konten:</label><br>
        <textarea id="konten" name="konten" rows="4" cols="50" required></textarea><br><br>
        <label for="penulis">Penulis:</label>
        <input type="text" id="penulis" name="penulis" required><br><br>
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" required><br><br>
        <input type="submit" value="Tambah Pengumuman">
    </form>
</div>

</body>
</html>
