<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "db_sewakamera";  // Gantilah dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
