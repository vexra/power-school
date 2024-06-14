<?php
    include '../includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            background-color: #ecf0f1;
        }

        .container {
            display: flex;
            width: 100%;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #ecf0f1;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }


        .stats, .details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 55px;
            height: 100px;
        }

        .card, .detail-card {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            flex: 1;
            margin: 0 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s, background-color 0.3s;
            text-decoration: none;
            color: inherit;
        }

        .card:hover, .detail-card:hover {
            transform: translateY(-10px);
            background-color: #f1f1f1;
            cursor: pointer;
        }
        .card h3, .detail-card h3 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .downloads ul {
            list-style: none;
        }

        .downloads ul li {
            background-color: #fff;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s, background-color 0.3s;
        }

        .downloads ul li:hover {
            transform: translateY(-5px);
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .downloads ul li a {
            display: block;
            text-decoration: none;
            color: inherit;
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            include '../templates/sidebar.php';
        ?>

        <main class="main-content">
            <header>
                <div class="header-left">
                    <h1>Selamat Datang di Halaman Administrator</h1>
                </div>
            </header>
            <section class="stats">
                <a href="nilai/index.php" class="card">
                    <h3>Nilai</h3>
                </a>
                <a href="kehadiran_siswa/index.php" class="card">
                    <h3>Kehadiran</h3>
                </a>
                <a href="pengumuman/index.php" class="card">
                    <h3>Pengumuman</h3>
                </a>
            </section>
            <section class="downloads">
            <h2>HEADLINE NEWS</h2>
                <ul>
                    <?php
                    include '../../includes/db_connect.php';
                    
                    $sql = "SELECT id, judul FROM pengumuman ORDER BY tanggal DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<li><a href='Pengumuman/detail.php?id=" . $row["id"] . "'>" . $row["judul"] . "</a></li>";
                        }
                    } else {
                        echo "<li>Tidak ada pengumuman tersedia</li>";
                    }
                    $conn->close();
                    ?>
                </ul>
            </section>
            <section class="details">
                <div class="detail-card">
                    <h3>3</h3>
                    <p>Kelas</p>
                </div>
                <div class="detail-card">
                    <h3>14</h3>
                    <p>Pelajaran</p>
                </div>
                <div class="detail-card">
                    <h3>5</h3>
                    <p>Siswa</p>
                </div>
                <div class="detail-card">
                    <h3>7</h3>
                    <p>Guru</p>
                </div>
            </section>
        </main>
    </div>
</body>
</html>