<?php
include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //ambil data dari form
    $nama_product = $_POST['nama_product'] ??'';
    $kategori = $_POST['kategori'] ??'';
    $harga_sewa = $_POST['harga_sewa'] ??'';
    $status_produk = $_POST['status_produk'] ??'';

    //memvalidasi
    if (!empty($nama_product) && !empty($kategori) && !empty($harga_sewa) && !empty($status_produk)) {
        //menambahkan data baru
        $sqlInsert = "INSERT INTO product (nama_product, kategori, harga_sewa, status_prodct)
        VALUES ('$nama_product', '$kategori', '$harga_sewa', '$status_produk')";
    }
    if ($koneksi->query($sqlInsert)){
        echo "<script>alert('Data berhasil disimpan!'); window.location.href='kamerainpt.php';</script>";
    }else{
        echo "<script>alert('Gagal menambahkan data: " . $koneksi->error . "');</script>";
    }
}else{
    echo "<script>alert('Harap lengkapi semua data!');</script>";
}
// Cek apakah $sqlInsert sudah didefinisikan
if (isset($sqlInsert)) {
    // Eksekusi query
    if (mysqli_query($conn, $sqlInsert)) {
        echo "<script>alert('Data berhasil disimpan!'); window.location.href='daftar_kamerainpt.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($conn) . "');</script>";
    }
} 

?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Data </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <style>

    </style>
    </head>
    <body>
    <div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h2 class="m-0 font-weight-bold text-primary">Tambah Data Produk</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama_product">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_product" name="nama_product" placeholder="Masukkan Nama Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_sewa">Harga Sewa per Hari</label>
                            <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" placeholder="Masukkan Harga Sewa" required>
                        </div>
                        <div class="form-group">
                            <label for="status_produk">Status</label>
                            <select class="form-control" id="status_produk" name="status_produk" required>
                                <option value="">Pilih Status</option>
                                <option value="ada">Ada</option>
                                <option value="tidak ada">Tidak Ada</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="kamerainpt.php" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</form>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

            </div>
    </body>
</html>