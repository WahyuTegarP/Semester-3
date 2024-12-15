<?php
// Sambungkan ke database
include 'C:\laragon\www\PROJECT\Semester-3\pages\admin\koneksi.php'; // Sesuaikan lokasi file koneksi Anda

// Ambil data dari tabel product
$sql = "SELECT * FROM product";
$result = $koneksi->query($sql);

// Cek jika form edit dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $nama_product = $_POST['nama_product'];
    $kategori = $_POST['kategori'];
    $harga_sewa = $_POST['harga_sewa'];
    $status_produk = $_POST['status_produk'];

    // Validasi input
    if (!empty($nama_product) && !empty($kategori) && !empty($harga_sewa) && !empty($status_produk)) {
        // Query untuk memperbarui data produk
        $stmt = $koneksi->prepare("UPDATE product SET nama_product = ?, kategori = ?, harga_sewa = ?, status_produk = ? WHERE product_id = ?");
        $stmt->bind_param("ssisi", $nama_product, $kategori, $harga_sewa, $status_produk, $product_id);

        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href='';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui data: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Harap lengkapi semua data!');</script>";
    }
}


// Cek jika ada permintaan untuk menghapus data
if (isset($_GET['delete'])) {
    $product_id = $_GET['delete'];

    // Query untuk menghapus data berdasarkan ID
    $stmt = $koneksi->prepare("DELETE FROM product WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h2 class="m-0 font-weight-bold text-primary">Daftar Barang</h2>
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addDataModal">
                        <i class="fas fa-plus"></i> Tambah Barang
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" width="100%" cellspacing="0">
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
    <div class="action-buttons">
        <button type="button" class="btn btn-warning btn-sm" 
            onclick="editInput('<?= $row['product_id'] ?>', '<?= htmlspecialchars($row['nama_product']) ?>', '<?= htmlspecialchars($row['kategori']) ?>', '<?= $row['harga_sewa'] ?>', '<?= htmlspecialchars($row['status_produk']) ?>')">
            <i class="bi bi-pencil"></i> Edit
        </button>
        <button type="button" class="btn btn-danger btn-sm" onclick="hapusData('<?= $row['product_id'] ?>')">
            <i class="bi bi-trash"></i> Hapus
        </button>
    </div>
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

    <!-- Modal Edit Data -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form untuk menyimpan perubahan -->
                <form id="editForm" method="POST" action="">
                    <div class="mb-3">
                        <label for="editNama" class="form-label">Nama Kamera</label>
                        <input type="text" class="form-control" id="editNama" name="nama_product" required>
                    </div>
                    <div class="mb-3">
                        <label for="editKategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="editKategori" name="kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="editHarga" class="form-label">Harga Sewa</label>
                        <input type="number" class="form-control" id="editHarga" name="harga_sewa" required>
                    </div>
                    <div class="mb-3">
                        <label for="status_produk" class="form-label">Status</label>
                        <select class="form-control" id="status_produk" name="status_produk" required>
                            <option value="">Pilih Status</option>
                            <option value="ada">Ada</option>
                            <option value="tidak ada">Tidak Ada</option>
                        </select>
                    </div>
                    <input type="hidden" id="editProductId" name="product_id">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk membuka modal edit dengan data pengguna
    // Fungsi untuk membuka modal edit dengan data produk
function editInput(id, nama, kategori, harga, status) {
    // Isi data ke form modal edit
    document.getElementById('editProductId').value = id;
    document.getElementById('editNama').value = nama;
    document.getElementById('editKategori').value = kategori;
    document.getElementById('editHarga').value = harga;
    document.getElementById('status_produk').value = status;

    // Tampilkan modal edit
    var editModal = new bootstrap.Modal(document.getElementById('editModal'));
    editModal.show();
}

    function hapusData(product_id) {
    if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        return; // Batalkan jika pengguna memilih "Batal"
    }

    // Kirim permintaan hapus ke server menggunakan AJAX
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            const response = JSON.parse(this.responseText);
            if (response.success) {
                alert('Data berhasil dihapus!');
                window.location.reload(); // Refresh halaman setelah data berhasil dihapus
            } else {
                alert('Gagal menghapus data: ' + response.message);
            }
        }
    };

    // Konfigurasi permintaan ke server
    xhttp.open("POST", "crud/delete_product.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("product_id=" + product_id);
}


</script>