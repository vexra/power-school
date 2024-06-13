<?php 
session_start();
include 'koneksi/koneksi.php';
if(isset($_SESSION['kd_cs'])) {
    $kode_cs = $_SESSION['kd_cs'];
}