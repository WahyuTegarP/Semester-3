<?php
// koneksi.php
$host = 'localhost'; // Nama host
$user = 'root'; // Username database
$password = ''; // Password database (kosong jika default)
$database = 'db_sewakamera'; // Nama database

// Membuat koneksi
$koneksi = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>