<?php
    include '../../includes/db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT judul, konten, penulis, tanggal FROM pengumuman WHERE id=$id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($row["judul"]); ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .announcement-detail {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 800px;
            width: 90%;
            text-align: justify;
        }

        .announcement-detail .judul {
            font-size: 2.5em;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .announcement-detail .penulis, .announcement-detail .tanggal {
            font-size: 1em;
            color: #666;
            margin-bottom: 10px;
        }

        .announcement-detail .konten {
            font-size: 1.1em;
            line-height: 1.6;
            color: #333;
            margin-bottom: 20px;
        }

        .back-button {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1.1em;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="announcement-detail">
    <div class="judul"><?php echo htmlspecialchars($row["judul"]); ?></div>
    <div class="penulis">Di Post Oleh: <?php echo htmlspecialchars($row["penulis"]); ?></div>
    <div class="tanggal">Tanggal: <?php echo date('d M Y H:i', strtotime($row["tanggal"])); ?></div>
    <div class="konten"><?php echo nl2br(htmlspecialchars($row["konten"])); ?></div>
    <button class="back-button" onclick="window.location.href='index.php'">&larr; Kembali ke Daftar Pengumuman</button>
</div>

</body>
</html>
<?php
    } else {
        echo "Pengumuman tidak ditemukan.";
    }
} else {
    echo "ID pengumuman tidak disediakan.";
}

$conn->close();
?>
