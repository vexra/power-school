<style>
    .sidebar {
        width: 250px;
        background-color: #315a84;
        color: #ecf0f1;
        padding: 20px 48px;
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
</style>

<aside class="sidebar">
    <div class="profile">
        <img src="../assets/images/logo.png" alt="Profile Picture">
    </div>
    <nav class="menu">
        <ul>
            <li class="menu-item"><a href="/power-school/pages/"><i class="fas fa-tachometer-alt"></i><span class="menu-item-text">Dashboard</span></a></li>
            <li class="menu-item"><a href="/power-school/pages/siswa/index.php"><i class="fas fa-user-graduate"></i><span class="menu-item-text">Siswa</span></a></li>
            <li class="menu-item"><a href="/power-school/pages/guru/index.php"><i class="fas fa-chalkboard-teacher"></i><span class="menu-item-text">Guru</span></a></li>
            <li class="menu-item"><a href="/power-school/pages/nilai/index.php"><i class="fas fa-clipboard-list"></i><span class="menu-item-text">Nilai</span></a></li>
            <li class="menu-item"><a href="/power-school/pages/kelas/index.php"><i class="fas fa-school"></i><span class="menu-item-text">Kelas</span></a></li>
            <li class="menu-item"><a href="/power-school/pages/jadwal_pelajaran/index.php"><i class="fas fa-calendar-alt"></i><span class="menu-item-text">Jadwal</span></a></li>
            <li class="menu-item"><a href="/power-school/pages/kehadiran_siswa"><i class="fas fa-check"></i><span class="menu-item-text">Kehadiran</span></a></li>
            <li class="menu-item"><a href="/power-school/pages/Pengumuman/index.php"><i class="fas fa-bullhorn"></i><span class="menu-item-text">Pengumuman</span></a></li>
        </ul>
    </nav>
</aside>