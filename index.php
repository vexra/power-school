<?php
    include '../../includes/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        }

        .container {
            display: flex;
            width: 100%;
        }

        .sidebar {
            width: 250px;
            background-color: #2C3E50;
            color: #ecf0f1;
            padding: 20px;
        }

        .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-pic {
            width: 100px;
            height: 100px;
            background-color: #bdc3c7;
            border-radius: 50%;
            margin: 0 auto;
        }

        .menu ul {
            list-style: none;
        }

        .menu-item {
            margin: 10px 0;
        }

        .menu-item a {
            color: #ecf0f1;
            text-decoration: none;
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
            margin-bottom: 20px;
        }

        .card, .detail-card {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            flex: 1;
            margin: 0 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
        }
    </style>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="profile">
                <div class="profile-pic"></div>
                <h2>Ervina Nurhayati</h2>
                <span>Online</span>
            </div>
            <nav class="menu">
                <ul>
                    <li class="menu-item"><a href="#">Dashboard</a></li>
                    <li class="menu-item"><a href="#">Siswa</a></li>
                    <li class="menu-item"><a href="#">Guru</a></li>
                    <li class="menu-item"><a href="#">Nilai</a></li>
                    <li class="menu-item"><a href="#">Kelas</a></li>
                    <li class="menu-item"><a href="#">Jadwal</a></li>
                    <li class="menu-item"><a href="#">Kehadiran</a></li>
                    <li class="menu-item"><a href="#">Pengumuman</a></li>
                    <li class="menu-item"><a href="#">Setting Web</a></li>
                    <li class="menu-item"><a href="#">Statistik</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <header>
                <div class="header-left">
                    <h1>Selamat Datang di Halaman Administrator</h1>
                </div>
                <div class="header-right">
                    <span>Ervina Nurhayati</span>
                    <span>Senin, 30 November 2020</span>
                    <span>20:28:01</span>
                </div>
            </header>
            <section class="stats">
                <div class="card">
                    <h3>13</h3>
                    <p>Artikel Tersimpan</p>
                </div>
                <div class="card">
                    <h3>8</h3>
                    <p>Modul</p>
                </div>
                <div class="card">
                    <h3>13</h3>
                    <p>Galeri Foto</p>
                </div>
                <div class="card">
                    <h3>Pengunjung</h3>
                </div>
            </section>
            <section class="downloads">
                <h2>Hit Materi</h2>
                <ul>
                    <li>CV Muhammad Farid H.doc</li>
                    <li>KUNCI JAWABAN BAHASA INDOESIA SMK TIPE B.docx</li>
                    <li>RPL_A_PEMBAHASAN.pdf</li>
                    <li>latihan-b-indo-un-smk.pdf</li>
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
                    <p>Pengajar</p>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
