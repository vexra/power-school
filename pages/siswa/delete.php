<?php
    include '../../includes/db_connect.php';

    if (isset($_GET['deleteId'])) {
        $id = $_GET['deleteId'];

        $sql = "delete from `siswa` where id_siswa=$id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo 'deleted successfully';
            header('location:index.php');
        }
        else {
            die(mysqli_error($conn));
        }
    }
?>