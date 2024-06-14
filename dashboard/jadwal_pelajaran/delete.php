<?php
    include '../../includes/db_connect.php';
    include '../../includes/session.php';

    $id_jadwal = $_GET['deleteId'];

    $sql = "DELETE FROM `jadwal_pelajaran` WHERE id_jadwal='$id_jadwal'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php");
    } else {
        die(mysqli_error($conn));
    }
?>
