<?php
include 'C:\laragon\www\Semester-3\pages\user\koneksi.php';

if (isset($_POST['sign-in'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    // Perbaiki variabel $nama menjadi $username
    $sql = "SELECT * FROM user WHERE email='$email' and password='$password'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        
        // Perbaiki typo $_SESIION menjadi $_SESSION
        $_SESSION['email'] = $row['email'];

        // Tambahkan titik koma di akhir baris
        header("location: login.php");
        exit();
    } else {
        echo "Not Found Incorrect Email or Password";
    }
}
?>
    

<?php
include 'C:\laragon\www\Semester-3\pages\user\koneksi.php';

if (isset($_POST['sign-up'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    // Perbaikan pada query: pastikan tabel adalah `users` bukan `nama`
    $checkUsername = "SELECT * FROM user WHERE email='$email'";
    $result = $koneksi->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "Email Already Exists!";
    } else {
        // Query untuk memasukkan data pengguna baru
        $insertQuery = "INSERT INTO user(nama, email, password) VALUES ('$nama', '$email', '$password')";

        if ($koneksi->query($insertQuery) === TRUE) {
            header("location: login.php");
            exit(); // Penting untuk menghentikan eksekusi setelah header
        } else {
            // Perbaikan variabel kesalahan: gunakan $conn->error
            echo "Error: " . $koneksi->connect_error;
        }
    }
} else {
    echo "Invalid Request!";
}
?>