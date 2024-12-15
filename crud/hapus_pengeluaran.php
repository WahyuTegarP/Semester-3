<?php
// Menghubungkan ke database
include 'C:\laragon\www\PROJECT\Semester-3\pages\admin\koneksi.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Query untuk menghapus data pengeluaran
    $sql = "DELETE FROM pengeluaran WHERE pengeluaran_id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus data.']);
    }

    $stmt->close();
}
?>