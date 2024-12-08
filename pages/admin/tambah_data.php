<?php
include 'connection/conn.php';

if($_SERVER['REQUEST_METHOD'] = 'POST') {
    //ambil data dari form
    $nama_product = $_POST['nama_product'];
    $kategori = $_POST['kategori'];
    $harga_sewa = $_POST['harga_sewa'];
    $status_produk = $_POST['status_produk'];

    //simpan data ke database
    $query = "INSERT INTO product (nama_product, kategori, harga_sewa, status_prodct)
    VALUES ('$nama_product', '$kategori', '$harga_sewa', '$status_produk')";
    if (mysqli_query($conn, $query)){
        echo "Data berhasil disimpan";
    }else{
        echo "Data gagal disimpan" . $query."<br>". mysqli_error($conn);
    }
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Data </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"><
    <style>

    </style>
    </head>
    <body>
    <div class="row">
    <div class="col-lg-12">
        <!-- Tabel Alat -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Data</h6>
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addDataModal">
                    <i class="fas fa-plus"></i> Tambah Kamera
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Alat</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kamera DSLR</td>
                                <td>Fotografi</td>
                                <td>Tersedia</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Detail</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tripod</td>
                                <td>Aksesori</td>
                                <td>Tidak Tersedia</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Detail</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Drone</td>
                                <td>Videografi</td>
                                <td>Tersedia</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Detail</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
            <h1>Form Tambah Data</h1>
    </body>
</html>