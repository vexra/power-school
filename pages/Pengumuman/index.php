<?php
    include '../../includes/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pengumuman Sekolah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* tambahan: warna latar belakang */
        }
        .container {
            width: 80%;
            margin: auto;
            margin-top: 30px;
            padding: 20px;
            background-color: #fff; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }
        h1 {
            font-size: 50px;
            text-align: center;
            margin-bottom: 30px;
            color: #333; /* tambahan: warna teks */
        }
        .announcement {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 15px 0;
        }
        .announcement img {
            margin-right: 15px;
        }
        .date-box {
            background-color: #d1b894;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin-right: 15px;
        }
        .date-box .date {
            font-size: 2em;
            font-weight: bold;
        }
        .date-box .month-year {
            text-transform: uppercase;
        }
        .details {
            flex: 1;
        }
        .details .judul {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .details .konten {
            margin-bottom: 10px;
        }
        .details .tanggal, .details .penulis {
            font-size: 0.9em;
            color: #555;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .actions button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s; /* tambahan: transisi efek hover */
        }
        .actions .delete {
            background-color: #DC2626;
        }
        .actions button.delete:hover {
            background-color: #FF6767; /* tambahan: warna latar belakang saat dihover */
        }
        .actions .update {
            width : 55px;
            background-color: #2563EB;
        }
        .actions button.update:hover {
            background-color: #6392FA; /* tambahan: warna latar belakang saat dihover */
        }
        .add-button {
            display: inline-block; /* diganti: block ke inline-block */
            padding: 10px 20px;
            background-color: #4ADE80;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none; /* tambahan: hapus garis bawah */
            transition: background-color 0.3s; /* tambahan: transisi efek hover */
        }

        .add-button:hover {
            background-color: #45a049; /* tambahan: warna latar belakang saat dihover */
        }

        
    </style>
</head>
<body>

<div class="container">
    <h1>Pengumuman</h1>

    <a href="create_form.php" class="add-button">Tambah Pengumuman Baru</a>

    <div id="pengumuman">
        <!-- Pengumuman akan ditampilkan di sini -->
        <?php
        include 'read.php';
        ?>
    </div>
</div>

</body>
</html>

