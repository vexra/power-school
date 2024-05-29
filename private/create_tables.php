<?php
// File: seed_database.php
include '../includes/db_connect.php'; // Sertakan file db_connect.php

// Buat tabel siswa
$sql_siswa = "CREATE TABLE IF NOT EXISTS siswa (
    id_siswa INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    tanggal_lahir DATE NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    kelas VARCHAR(20) NOT NULL,
    nomor_telepon VARCHAR(20),
    email VARCHAR(100)
)";
if ($conn->query($sql_siswa) === TRUE) {
    echo "Tabel siswa berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error saat membuat tabel siswa: " . $conn->error;
}

// Buat tabel guru
$sql_guru = "CREATE TABLE IF NOT EXISTS guru (
    id_guru INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    tanggal_lahir DATE NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    mata_pelajaran VARCHAR(100) NOT NULL,
    nomor_telepon VARCHAR(20),
    email VARCHAR(100)
)";
if ($conn->query($sql_guru) === TRUE) {
    echo "Tabel guru berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error saat membuat tabel guru: " . $conn->error;
}

// Buat tabel kelas
$sql_kelas = "CREATE TABLE IF NOT EXISTS kelas (
    id_kelas INT AUTO_INCREMENT PRIMARY KEY,
    nama_kelas VARCHAR(20) NOT NULL,
    tingkat_kelas ENUM('SD', 'SMP', 'SMA') NOT NULL,
    wali_kelas INT,
    informasi_tambahan TEXT,
    FOREIGN KEY (wali_kelas) REFERENCES guru(id_guru)
)";
if ($conn->query($sql_kelas) === TRUE) {
    echo "Tabel kelas berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error saat membuat tabel kelas: " . $conn->error;
}

// Buat tabel jadwal pelajaran
$sql_jadwal = "CREATE TABLE IF NOT EXISTS jadwal_pelajaran (
    id_jadwal INT AUTO_INCREMENT PRIMARY KEY,
    hari VARCHAR(20) NOT NULL,
    jam_mulai TIME NOT NULL,
    jam_selesai TIME NOT NULL,
    id_kelas INT,
    mata_pelajaran VARCHAR(100) NOT NULL,
    id_guru INT,
    FOREIGN KEY (id_kelas) REFERENCES kelas(id_kelas),
    FOREIGN KEY (id_guru) REFERENCES guru(id_guru)
)";
if ($conn->query($sql_jadwal) === TRUE) {
    echo "Tabel jadwal pelajaran berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error saat membuat tabel jadwal pelajaran: " . $conn->error;
}

// Buat tabel kehadiran siswa
$sql_kehadiran = "CREATE TABLE IF NOT EXISTS kehadiran_siswa (
    id_kehadiran INT AUTO_INCREMENT PRIMARY KEY,
    tanggal DATE NOT NULL,
    id_siswa INT,
    status_kehadiran ENUM('Hadir', 'Izin', 'Sakit', 'Alpa') NOT NULL,
    FOREIGN KEY (id_siswa) REFERENCES siswa(id_siswa)
)";
if ($conn->query($sql_kehadiran) === TRUE) {
    echo "Tabel kehadiran siswa berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error saat membuat tabel kehadiran siswa: " . $conn->error;
}

// Buat tabel nilai siswa
$sql_nilai = "CREATE TABLE IF NOT EXISTS nilai_siswa (
    id_nilai INT AUTO_INCREMENT PRIMARY KEY,
    id_siswa INT,
    mata_pelajaran VARCHAR(100) NOT NULL,
    nilai FLOAT NOT NULL,
    FOREIGN KEY (id_siswa) REFERENCES siswa(id_siswa)
)";
if ($conn->query($sql_nilai) === TRUE) {
    echo "Tabel nilai siswa berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error saat membuat tabel nilai siswa: " . $conn->error;
}

// Buat tabel pengumuman
$sql_pengumuman = "CREATE TABLE IF NOT EXISTS pengumuman (
    id_pengumuman INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    isi TEXT NOT NULL,
    tanggal_posting DATE NOT NULL,
    pembuat VARCHAR(50) NOT NULL
)";
if ($conn->query($sql_pengumuman) === TRUE) {
    echo "Tabel pengumuman berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error saat membuat tabel pengumuman: " . $conn->error;
}

// Buat tabel user
$sql_user = "CREATE TABLE IF NOT EXISTS user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    hak_akses ENUM('Admin', 'Guru', 'Siswa') NOT NULL
)";
if ($conn->query($sql_user) === TRUE) {
    echo "Tabel user berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error saat membuat tabel user: " . $conn->error;
}

// Selesai
$conn->close();
?>
