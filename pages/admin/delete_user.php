<?php
// Menghubungkan ke database
include 'C:\laragon\www\PROJECT\Semester-3\pages\admin\koneksi.php';

// Cek apakah ada user_id yang dikirimkan
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Query untuk menghapus pengguna berdasarkan user_id
    $sql = "DELETE FROM user WHERE user_id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $user_id); // 'i' untuk integer
    if ($stmt->execute()) {
        // Redirect ke halaman data pengguna setelah berhasil dihapus
        header('Location: pengguna.php');
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "User ID tidak ditemukan.";
}
?>
