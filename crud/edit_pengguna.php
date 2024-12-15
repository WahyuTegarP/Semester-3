<?php
// Koneksi ke database
include 'C:\laragon\www\PROJECT\Semester-3\pages\admin\koneksi.php';

// Cek apakah form edit telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $user_id = $_POST['user_id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    // Query untuk memperbarui data pengguna
    $update_sql = "UPDATE user SET nama = ?, email = ?, password = ?, Status = ? WHERE user_id = ?";

    if ($stmt = $koneksi->prepare($update_sql)) {
        // Bind parameters
        $stmt->bind_param("ssssi", $nama, $email, $password, $status, $user_id);

        // Eksekusi query
        if ($stmt->execute()) {
            // Redirect setelah data berhasil diperbarui
            echo "<script>
                alert('Data berhasil diperbarui!');
                window.location.href = 'pengguna.php'; // Redirect ke halaman pengguna
            </script>";
        } else {
            echo "<script>alert('Terjadi kesalahan: " . $stmt->error . "');</script>";
        }

        // Tutup statement
        $stmt->close();
    } else {
        echo "<script>alert('Query gagal dipersiapkan: " . $koneksi->error . "');</script>";
    }
}
?>
