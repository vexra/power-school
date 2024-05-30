<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Memuat autoloader Composer

// Load .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..', '.env.local'); // Sesuaikan dengan jalur menuju .env.local Anda
$dotenv->load();

$servername = $_ENV['DB_HOST']; // Ambil nilai DB_HOST dari .env.local
$username = $_ENV['DB_USERNAME']; // Ambil nilai DB_USERNAME dari .env.local
$password = $_ENV['DB_PASSWORD']; // Ambil nilai DB_PASSWORD dari .env.local
$database = $_ENV['DB_NAME']; // Ambil nilai DB_NAME dari .env.local

// Membuat koneksi
$conn = new mysqli($servername, $username, $password);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Buat database jika belum ada
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) !== TRUE) {
    echo "Error saat membuat database: " . $conn->error;
}

// Pilih database
$conn->select_db($database);
?>
