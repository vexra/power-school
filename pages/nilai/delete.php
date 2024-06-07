<?php
    include '../../includes/db_connect.php';

    $id_nilai = $_GET["deleteId"];
    $sql = "DELETE FROM nilai_siswa WHERE id_nilai=$id_nilai";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>
