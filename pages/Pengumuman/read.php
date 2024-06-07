<?php
    include '../../includes/db_connect.php';

$sql = "SELECT id, judul, konten, penulis, tanggal FROM pengumuman ORDER BY tanggal DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $date = date('d', strtotime($row["tanggal"]));
        $monthYear = date('M Y', strtotime($row["tanggal"]));
        $time = date('H:i', strtotime($row["tanggal"]));

        echo "<div class='announcement'>";
        echo "<div class='date-box'>";
        echo "<div class='date'>$date</div>";
        echo "<div class='month-year'>$monthYear</div>";
        echo "<div class='time'>$time WIB</div>";
        echo "</div>";
        echo "<div class='details'>";
        echo "<div class='judul'>" . htmlspecialchars($row["judul"]) . "</div>";

        // Potong konten jika terlalu panjang
        $max_length = 200; // Panjang maksimum konten sebelum dipotong
        $content = htmlspecialchars($row["konten"]);
        if (strlen($content) > $max_length) {
            $content = substr($content, 0, $max_length) . "... <a href='detail.php?id=" . $row['id'] . "'>lainnya</a>";
        }
        
        echo "<div class='konten'>$content</div>";
        echo "<div class='penulis'>Di Post Oleh: " . htmlspecialchars($row["penulis"]) . "</div>";
        echo "</div>";
        echo "<div class='actions'>";
        echo "<form method='post' action='update_form.php'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<button type='submit' class='update'>Update</button>";
        echo "</form>";
        echo "<form method='post' action='delete.php' onsubmit='return confirm(\"Anda yakin ingin menghapus pengumuman ini?\");'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<button type='submit' class='delete'>Hapus</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Tidak ada pengumuman yang ditemukan.";
}

$conn->close();
?>
