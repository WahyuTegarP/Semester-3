<?php
include 'C:\laragon\www\PROJECT\Semester-3\pages\admin\koneksi.php'; // Sesuaikan path ke file koneksi Anda

// Periksa apakah permintaan POST diterima
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'] ?? '';

    if (!empty($product_id)) {
        // Query untuk menghapus data berdasarkan ID
        $stmt = $koneksi->prepare("DELETE FROM product WHERE product_id = ?");
        $stmt->bind_param("i", $product_id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal menghapus data: ' . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'ID produk tidak ditemukan']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Metode tidak valid']);
}
?>
