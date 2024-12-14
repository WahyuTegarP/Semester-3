<?php
// Sambungkan ke database
include 'C:\laragon\www\PROJECT\Semester-3\pages\admin\koneksi.php'; // Sesuaikan lokasi file koneksi Anda

// Ambil data dari tabel product
$sql = "SELECT * FROM product";
$result = $koneksi->query($sql);

// Proses tambah data jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_product = $_POST['nama_product'] ?? '';
    $kategori = $_POST['kategori'] ?? 'Kamera'; // Default kategori "Kamera"
    $harga_sewa = $_POST['harga_sewa'] ?? '';
    $status_produk = $_POST['status_produk'] ?? '';

    // Validasi sederhana
    if (!empty($nama_product) && !empty($kategori) && !empty($harga_sewa) && !empty($status_produk)) {
        // Query untuk menambahkan data baru
        $sqlInsert = "INSERT INTO product (nama_product, kategori, harga_sewa, status_produk)
                      VALUES ('$nama_product', '$kategori', '$harga_sewa', '$status_produk')";

        if ($koneksi->query($sqlInsert)) {
            echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data: " . $koneksi->error . "');</script>";
        }
    } else {
        echo "<script>alert('Harap lengkapi semua data!');</script>";
    }
}

// Proses hapus data
if (isset($_GET['hapus'])) {
    $product_id = $_GET['hapus'];
    $sqlHapus = "DELETE FROM product WHERE product_id = ?";
    $stmt = $koneksi->prepare($sqlHapus);
    $stmt->bind_param("i", $product_id);
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='kamerainpt.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . $koneksi->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kamera</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h2 class="m-0 font-weight-bold text-primary">Daftar Kamera</h2>
                    <a href="tambah_data.php" class="btn btn-sm btn-success">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kamera</th>
                                    <th>Kategori</th>
                                    <th>Harga Sewa</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if ($result->num_rows > 0):
                                    while ($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= htmlspecialchars($row['nama_product']); ?></td>
                                            <td><?= htmlspecialchars($row['kategori']); ?></td>
                                            <td>Rp <?= number_format($row['harga_sewa'], 0, ',', '.'); ?></td>
                                            <td><?= htmlspecialchars($row['status_produk']); ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">Detail</button>
                                                <button class="btn btn-sm btn-warning">Edit</button>
                                                <a href="?hapus=<?= $row['product_id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endwhile;
                                else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data kamera.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Kamera</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_product">Nama Kamera</label>
                            <input type="text" class="form-control" id="nama_product" name="nama_product" placeholder="Masukkan Nama Kamera" required>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
