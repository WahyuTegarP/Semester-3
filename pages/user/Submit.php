<?php
// Pastikan koneksi database sudah benar
include_once('pages/user/koneksi.php');

// Mengecek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Memastikan bahwa product_id ada dalam $_POST
    if (isset($_POST['item']) && !empty($_POST['item'])) {
        $product_id = $_POST['item'];
    } else {
        echo "product_id tidak disertakan.";
        exit;
    }

    // Mengambil data dari form
    $nama_product = isset($_POST['nama_product']) ? $_POST['nama_product'] : null;
    $nama_penyewa = isset($_POST['nama_penyewa']) ? $_POST['nama_penyewa'] : null;
    $tgl_transaksi = isset($_POST['tgl_transaksi']) ? $_POST['tgl_transaksi'] : null;
    $jam_pengembalian = isset($_POST['jam_pengembalian']) ? $_POST['jam_pengembalian'] : null;
    $barang_jaminan = isset($_POST['barang_jaminan']) ? $_POST['barang_jaminan'] : null;
    $metode_transaksi = isset($_POST['metode_transaksi']) ? $_POST['metode_transaksi'] : null;

    // Proses upload file
    if (isset($_FILES['bukti_gambar'])) {
        $target_dir = "uploads/";  // Direktori tempat file akan disimpan
        $target_file = $target_dir . basename($_FILES["bukti_gambar"]["name"]);
        
        // Memindahkan file dari direktori sementara ke direktori tujuan
        if (move_uploaded_file($_FILES["bukti_gambar"]["tmp_name"], $target_file)) {
            $file_path = $target_file;
        } else {
            echo "Terjadi kesalahan saat mengupload file.";
            exit;
        }
    } else {
        echo "File path tidak disertakan.";
        exit;
    }

    // Siapkan query INSERT untuk database
    $sql = "INSERT INTO transaksi 
            (product_id, nama_penyewa, nama_product, tgl_transaksi, jam_pengembalian, barang_jaminan, metode_transaksi, bukti_gambar, created_at, sewa_id, jumlah_product, harga_sewa, harga_total)
            VALUES 
            ('$product_id', '$nama_penyewa', '$nama_product', '$tgl_transaksi', '$jam_pengembalian', '$barang_jaminan', '$metode_transaksi', '$file_path', NOW(),1,1,1,1)";

    // Menjalankan query dan memeriksa hasilnya
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
