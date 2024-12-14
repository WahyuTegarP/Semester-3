<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "rental_system");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Id = $_POST['Id'];
    $Nama = $_POST['Nama'];
    $Produk = $_POST['Produk'];
    $customer_address = $_POST['Alamat'];
    $Tanggal_Transaksi = $_POST['Tanggal_Transaksi'];
    $Tanggal_Transaksi = $_POST['Tanggal_Kembali'];
    $Jaminan = $_POST['Jaminan'];
    $Banyaknya = $_POST['Banyaknya'];
    $Durasi_Sewa = $_POST['Durasi_Sewa'];
    $Metode_Pembayaran = $_POST['Metode_Pembayaran'];
    $Total_Harga = $Banyaknya * 120000; // Example: assume each item costs $100.

    // File upload handling
    $Bukti_Jaminan = $_FILES['Bukti_Jaminan']['Nama'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($Bukti_Jaminan);
    move_uploaded_file($_FILES['Bukti_Jaminan']['tmp_name'], $target_file);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO transactions (Id, Nama, Produk, Alamat, Tanggal_Transaksi, Tanggal_Kembali, Jaminan, Banyaknya, Durasi_Sewa, Metode_Pembayaran, Bukti_Jaminan, Total_Harga) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisssd", $Id, $Nama, $Produk, $Alamat, $Tanggal_Transaksi, $Tanggal_Kembali, $Jaminan, $Banyaknya, $Durasi_Sewa, $Metode_Pembayaran, $Bukti_Jaminan, $Total_Harga);
    $stmt->execute();

    header("Location: Hasil_Transaksi.php");
    exit();
}
?>
