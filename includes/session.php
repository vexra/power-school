<?php
    session_start();

    // Periksa apakah pengguna belum login
    if (!isset($_SESSION['userId'])) {
        header('Location: /power-school/login/index.php');
        exit();
    }

    // Fungsi untuk memeriksa apakah pengguna memiliki hak akses admin
    function isAdmin() {
        // Masukkan logika atau query yang sesuai di sini
        // Misalnya, jika pengguna memiliki kolom 'role' dalam tabel pengguna,
        // Anda dapat memeriksa apakah 'role' nya adalah 'Admin'
        if ($_SESSION['role'] == 'Admin') {
            return true;
        } else {
            return false;
        }
    }

    // Periksa apakah pengguna bukan admin, jika tidak redirect ke halaman yang sesuai
    if (!isAdmin()) {
        header('Location: /power-school/index.php');
        exit();
    }
?>