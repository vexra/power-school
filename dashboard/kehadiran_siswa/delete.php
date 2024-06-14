<?php
    include '../../includes/db_connect.php';
    include '../../includes/session.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM kehadiran_siswa WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        header('Location: index.php');
    }
?>
