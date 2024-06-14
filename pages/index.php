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

        .sidebar {
            width: 250px;
            background-color: #315a84;
            color: #ecf0f1;
            padding: 20px;
            max-height: 100vh;
            overflow: auto;
        }

        .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile img {
            width: 170px;
            height: 170px;   
        }

        .menu ul {
            list-style: none;
            width: 100%;
            padding: 0;
        }

        .menu-item {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.4s;
        }

        .menu-item a {
            color: #ecf0f1;
            text-decoration: none;
            display: flex;
            align-items: center;
            
        }

        .menu-item:hover {
            background-color :#6e849d;
        }

        .menu-item a i {
            margin-right: 30px;
            font-size: 26px; 
            width: 15px;
        }

        .menu-item-text {
            display: flex;
            align-items: center;
            width: 100%;
            font-size: 18px;
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
            margin-bottom: 10px;
        }

        .menu ul {
            list-style: none;
        }

        .menu-item {
            margin: 10px 0;
            padding-bottom: 10px;
            border-bottom: 1px solid #7f8c8d; 
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
                <img src="../assets/images/logo.png" alt="Profile Picture">
            </div>
            <nav class="menu">
                <ul>
                    <li class="menu-item"><a href="#"><i class="fas fa-tachometer-alt"></i><span class="menu-item-text">Dashboard</span></a></li>
                    <li class="menu-item"><a href="#"><i class="fas fa-user-graduate"></i><span class="menu-item-text">Siswa</span></a></li>
                    <li class="menu-item"><a href="#"><i class="fas fa-chalkboard-teacher"></i><span class="menu-item-text">Guru</span></a></li>
                    <li class="menu-item"><a href="#"><i class="fas fa-clipboard-list"></i><span class="menu-item-text">Nilai</span></a></li>
                    <li class="menu-item"><a href="#"><i class="fas fa-school"></i><span class="menu-item-text">Kelas</span></a></li>
                    <li class="menu-item"><a href="#"><i class="fas fa-calendar-alt"></i><span class="menu-item-text">Jadwal</span></a></li>
                    <li class="menu-item"><a href="#"><i class="fas fa-check"></i><span class="menu-item-text">Kehadiran</span></a></li>
                    <li class="menu-item"><a href="#"><i class="fas fa-bullhorn"></i><span class="menu-item-text">Pengumuman</span></a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header>
                <div class="header-left">
                    <h1>Selamat Datang di Halaman Administrator</h1>
                </div>
                <div class="header-right">
                    <span>Rio Arisandi</span>
                    <span>Senin, 30 November 2020</span>
                    <span>20:20:20</span>
                </div>
            </header>
            <section class="stats">
                <div class="card">
                    <h3>Nilai</h3>
                </div>
                <div class="card">
                    <h3>Kehadiran</h3>
                </div>
                <div class="card">
                    <h3>Pengumuman</h3>
                </div>
            </section>
            <section class="downloads">
                <h2>NEWS</h2>
                <ul>
                    <li>CV Rio arisandi.doc</li>
                    <li>KUNCI JAWABAN PETRUK.docx</li>
                    <li>Nilai UAS WEB.pdf</li>
                    <li>Data Siswa Berprestasi.pdf</li>
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
