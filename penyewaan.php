<?php
session_start();
require "connection/conn.php";

// Debugging: Periksa apakah user_id ada di sesi
if (!isset($_SESSION['user_id'])) {
    echo "User  ID tidak ditemukan dalam sesi.";
    exit(); // Hentikan eksekusi jika user_id tidak ada
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil user_id dari sesi
    $user_id = $_SESSION['user_id'];
    
    // Debugging: Tampilkan user_id
    echo "User  ID: " . $user_id . "<br>";}

if($_SERVER["REQUEST_METHOD"] = "POST"){
    $user_id = $_SESSION['user_id'];
    $nama_penyewa = $_POST["nama_penyewa"]; 
    $alamat = $_POST["alamat"]; 
    $no_hp = $_POST["no_hp"]; 
    $jumlah_sewa = $_POST["jumlah_sewa"]; 
    $tgl_sewa = $_POST["tgl_sewa"]; 
    $jam_sewa = $_POST["jam_sewa"]; 
    $tgl_pengembalian = $_POST["tgl_pengembalian"]; 
    $jam_pengembalian = $_POST["jam_pengembalian"]; 
    $total_harga = $_POST["total_harga"]; 
    $metode_transaksi = $_POST["metode_transaksi"]; 

    /*menyimpan data sewa ke database*/ 
    $sql = "INSERT INTO sewa (user_id, nama_penyewa, alamat, no_hp, 
    jumlah_sewa, tgl_sewa, jam_sewa, tgl_pengembalian, jam_pengembalian, 
    total_harga, metode_transaksi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt -> bind_param("ississsssss", $user_id, $nama_penyewa, $alamat, 
    $no_hp, $jumlah_sewa, $tgl_sewa, $jam_sewa, $tgl_pengembalian, $jam_pengembalian, $total_harga, $metode_transaksi);

    if($stmt->execute()){
        echo "Data berhasil disimpan";
    }else{
        echo "Data gagal disimpan" .$stmt-> error;
    }
    $stmt->close();
    $conn->close();

}
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form penyewaan</title>
        <script>
            //menentukan harga sewa
            var harga_per_unit ={
                'Baterai Sony NP-FZ100 ' : 80000,
                'Baterai Sony NP-FZ100H' : 50000,
                'Drone Dji Movic' : 450000,
                'Mic Saramonic Blink ' : 60000,
                'Mic Shotgun Sony ' : 90000,
                'Lensa Sony Sigma ' : 140000,
                'Lensa Sony 50MM' : 125000,
                'Lensa Sony 85mm' : 100000,
                'Lensa Sony 35mm' : 85000,
                'Lensa Sony Sigma 16' : 140000,
                'Lensa Sony 28' : 100000,
                'Gimbal DJI RS 3 Mini' : 125000,
                'Gimbal Feiyu Scorp' : 190000,
                'Kamera Sony A7 Mark II' : 250000,
                'Kamera Sony A7 Mark III' : 350000,
                'Kamera Sony A6400 ' : 175000
            };

            function hitungTotal(){
                //mengambil nilai dari input jumlah sewa
                var jumlah_sewa = document.getElementById("jumlah_sewa").value;

                //hitung total harga
                var total_harga = harga_per_unit * jumlah_sewa;

                //menampilkan total harga
                document.getElementById("total_harga").innerText = "Total Harga: Rp " + total_harga.toLocaleString();
            }

            //membuat validasi ketika tombol submit ditekan
            function validasiForm(){
                //mengambil nilai dari input sewa
                var nama = document.getElementById("nama_penyewa").value;
                var alamat = document.getElementById("alamat").value;
                var no_telp = document.getElementById("no_telp").value;
                var jumlah_sewa = document.getElementById("jumlah_sewa").value;
                var tgl_sewa = document.getElementById("tanggal_sewa").value;
                var jam_sewa = document.getElementById("jam_sewa").value;
                var tgl_pengembalian = document.getElementById("tanggal_pengembalian").value;
                var jam_pengembalian = document.getElementById("jam_pengembalian").value;
                var metode_transaksi = document.getElementById("metode_transaksi").value;

                //memeriksa apakah inputan telah terisi
                if(nama == "" || alamat == "" || no_telp == "" || jumlah_sewa == "" 
                || tgl_sewa == "" || jam_sewa == "" || tgl_pengembalian == "" || jam_pengembalian == "" || metode_transaksi == ""){
                    alert("Mohon isi semua form yang telah disediakan");
                }else{
                    window.location.href = 'transaksi.php';
                }
            }
        </script>
        <style>
        body {
            display: flex;
            flex-direction: column; /*mengatur arah flex*/
            justify-content: center; /* Mengatur posisi horizontal */
            align-items: center; /* Mengatur posisi vertikal */
            height: 100vh; /* Mengatur tinggi body */
            background-color: #f0f0f0; /* Warna latar belakang */
        }

        .header{
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333; /* Warna latar belakang header*/
            color: #fff; /* Warna teks */
            padding: 30px;
            width: 100%; /* lebar header */
            text-align: left; /*text di kiri*/
            font-size: 30px; /* ukuran font */
            margin-bottom: 30px;
        }

        .form-container {
            background-color: white; /* Warna latar belakang form */
            padding: 20px; /* Ruang di dalam form */
            border-radius: 8px; /* Sudut membulat */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Bayangan */
            width: 300px; /* Lebar form */
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }  
        .form-group{
            display: flex;
            justify-content: flex-start; /*mengatur label dan inputan berada di kiri */
            margin-bottom: 15px; /* memberi jarak bawah antar kolom */
        } 
        .form-group label {
            font-size: medium;
            margin-bottom: 5px;
            margin-right: 10px;
        }  
        .form-control{
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-left: 10px;
        }
        .total-harga{
            margin-top: 15px;
        }
        .btn-primary{
            padding: 15px 20px;
            font-size: 16px;
            background-color: #333; /* Warna latar belakang tombol */
            color: #fff; /* Warna teks */
            border: none;
            cursor: pointer;
            margin-right: 50px; /* Tombol di kiri */
            display: block;
        }
        </style>
    </head>
    <body>
        <div class="header">Halaman Sewa</div>
        <form action="" method="post">
            <div class="form-group">
                <div id="user_id" name="user_id"></div>
                <label for="nama">Nama penyawa:</label>
                <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" placeholder="silahkan isi" required></div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="silahkan isi" required></div>
                </div>
                <div class="form-group">
                    <label for="no_telp">No HP:</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="silahkan isi" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_sewa">Jumlah sewa:</label>
                    <input type="number" class="form-control" id="jumlah_sewa" name="jumlah_sewa" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_sewa">Tanggal Sewa:</label>
                    <input type="date" class="form-control" id="tanggal_sewa" name="tgl_sewa" required>
                </div>
                <div class="form-group">
                    <label for="jam_sewa">jam Sewa:</label>
                    <input type="time" class="form-control" id="jam_sewa" name="jam_sewa" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
                    <input type="date" class="form-control" id="tanggal_pengembalian" name="tgl_pengembalian" required>
                </div>
                <div class="form-group">
                    <label for="jam_pengembalian">Jam Pengembalian:</label>
                    <input type="time" class="form-control" id="jam_pengembalian" name="jam_pengembalian" required>
                </div>
                <label id="total_harga" class="total-harga" name="total_harga">Total Harga: Rp. 0</label>
                <div class="form-group">
                    <label for="metode_transaksi">Metode Pembayaran</label>
                    <select id="metode_transaksi" name="metode_transaksi">
                    <option value="pilih">-- pilih metode pembayaran --</option>
                    <option value="Cash">Cash</option>
                    <option value="Transfer">Transfer</option>
                </select>
                </div>
                <button type="submit" class="btn btn-primary" onclick="validasiForm()">Sewa</button>
    </body>
    <?php
    ?>
</html>