<?php
include '../../includes/db_connect.php';
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

        .sidebar {
            width: 250px;
            background-color: #315a84;
            color: #ecf0f1;
            padding: 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="profile">
                <img src="pict/logo.png" alt="Profile Picture">
            </div>
            <nav class="menu">
                <ul>
                    <li class="menu-item <?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>"><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span class="menu-item-text">Dashboard</span></a></li>
                    <li class="menu-item <?php echo ($activePage == 'siswa') ? 'active' : ''; ?>"><a href="siswa.php"><i class="fas fa-user-graduate"></i><span class="menu-item-text">Siswa</span></a></li>
                    <li class="menu-item <?php echo ($activePage == 'guru') ? 'active' : ''; ?>"><a href="guru.php"><i class="fas fa-chalkboard-teacher"></i><span class="menu-item-text">Guru</span></a></li>
                    <li class="menu-item <?php echo ($activePage == 'nilai') ? 'active' : ''; ?>"><a href="nilai.php"><i class="fas fa-clipboard-list"></i><span class="menu-item-text">Nilai</span></a></li>
                    <li class="menu-item <?php echo ($activePage == 'kelas') ? 'active' : ''; ?>"><a href="kelas.php"><i class="fas fa-school"></i><span class="menu-item-text">Kelas</span></a></li>
                    <li class="menu-item <?php echo ($activePage == 'jadwal') ? 'active' : ''; ?>"><a href="jadwal.php"><i class="fas fa-calendar-alt"></i><span class="menu-item-text">Jadwal</span></a></li>
                    <li class="menu-item <?php echo ($activePage == 'kehadiran') ? 'active' : ''; ?>"><a href="kehadiran.php"><i class="fas fa-check"></i><span class="menu-item-text">Kehadiran</span></a></li>
                    <li class="menu-item <?php echo ($activePage == 'pengumuman') ? 'active' : ''; ?>"><a href="pengumuman.php"><i class="fas fa-bullhorn"></i><span class="menu-item-text">Pengumuman</span></a></li>
                </ul>
            </nav>
        </aside>
    </div>
</body>
</html>
