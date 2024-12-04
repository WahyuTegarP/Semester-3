<?php
// Menyertakan file koneksi
include('koneksi.php');

// Query untuk mengambil data dari tabel
$sql = "SELECT * FROM alat"; // Ganti dengan tabel yang ada di database kamu
$result = $conn->query($sql);

// Mengecek apakah ada data yang ditemukan
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Nama Alat: " . $row["nama_alat"] . "<br>"; // Ganti dengan nama kolom yang sesuai
    }
} else {
    echo "Tidak ada data";
}