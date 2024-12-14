<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $item = $_POST['item'];
    $payment_method = $_POST['payment_method'];

    // Proses unggah foto
    $photo_dir = "uploads/";
    $photo_name = basename($_FILES['guarantee_photo']['name']);
    $photo_path = $photo_dir . uniqid() . "_" . $photo_name;
    move_uploaded_file($_FILES['guarantee_photo']['tmp_name'], $photo_path);

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO transactions (customer_name, item, payment_method, guarantee_photo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $customer_name, $item, $payment_method, $photo_path);
    $stmt->execute();

    // Redirect ke halaman sukses
    header("Location: success.php");
    exit;
}
?>
