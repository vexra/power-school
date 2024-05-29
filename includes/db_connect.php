<?php
// File: db_connect.php

$servername = "localhost"; // Sesuaikan dengan nama server Anda
$username = "root"; // Sesuaikan dengan username database Anda
$password = ""; // Sesuaikan dengan password database Anda
$database = "power_school"; // Sesuaikan dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Buat database jika belum ada
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    echo "Database berhasil dibuat atau sudah ada.";
} else {
    echo "Error saat membuat database: " . $conn->error;
}

// Pilih database
$conn->select_db($database);
?>
