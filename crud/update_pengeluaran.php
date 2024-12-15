<?php
// koneksi.php harus sudah disertakan
include 'C:\laragon\www\PROJECT\Semester-3\pages\admin\koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id = $_POST['pengeluaran_id'];
    $tgl_pengeluaran = $_POST['tgl_pengeluaran'];
    $kategori = $_POST['kategori'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $harga_pengeluaran = $_POST['harga_pengeluaran'];
    $keterangan = $_POST['keterangan'];

    // Query untuk mengupdate data pengeluaran
    $sql = "UPDATE pengeluaran SET 
            tgl_pengeluaran = ?, 
            kategori = ?, 
            nama_barang = ?, 
            jumlah = ?, 
            metode_pembayaran = ?, 
            harga_pengeluaran = ?, 
            keterangan = ? 
            WHERE pengeluaran_id = ?";

    // Persiapkan dan eksekusi query
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('sssssssi', $tgl_pengeluaran, $kategori, $nama_barang, $jumlah, $metode_pembayaran, $harga_pengeluaran, $keterangan, $id);

    if ($stmt->execute()) {
        // Jika berhasil, redirect kembali ke halaman pengeluaran
        header('Location: pengeluaran.php'); // Ganti dengan halaman pengeluaran yang sesuai
        exit();
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal memperbarui data']);
    }

    $stmt->close();
}
?>
