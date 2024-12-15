<?php
// Sambungkan ke database
include 'C:\laragon\www\PROJECT\Semester-3\pages\admin\koneksi.php'; // Sesuaikan path file koneksi

// Ambil parameter pencarian
$cari = isset($_GET['cari']) ? strtolower(trim($_GET['cari'])) : '';

// Query untuk mengambil data pengeluaran
if ($cari !== '') {
    $sql = "SELECT * FROM pengeluaran 
            WHERE LOWER(id_pengeluaran) LIKE '%$cari%' 
            OR LOWER(nama_barang) LIKE '%$cari%' 
            OR LOWER(tgl_pengeluaran) LIKE '%$cari%'
            ORDER BY tgl_pengeluaran DESC";
} else {
    $sql = "SELECT * FROM pengeluaran ORDER BY tgl_pengeluaran DESC";
}

// Eksekusi query
$result = $koneksi->query($sql);

// Simpan hasil pengeluaran dalam array
$data_pengeluaran = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data_pengeluaran[] = $row;
    }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
    </div>

    <h3>Data Pengeluaran</h3>

    <!-- Form Pencarian -->
    <form class="d-none d-sm-inline-block form-inline my-2 my-md-0 mw-100 navbar-search" method="GET" action="">
    <div class="input-group">
        <input type="text" class="form-control bg-white border-0 small" placeholder="Search for..." name="cari" aria-label="Search" value="<?= htmlspecialchars($cari) ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

    <!-- Tabel Data Pengeluaran -->
    <table class="table table-striped table-hover my-4">
        <thead>
            <tr>
                <th class="text-light bg-primary">Id</th>
                <th class="text-light bg-primary">Tanggal</th>
                <th class="text-light bg-primary">Kerusakan</th>
                <th class="text-light bg-primary">Nama Barang</th>
                <th class="text-light bg-primary">Jumlah</th>
                <th class="text-light bg-primary">Harga</th>
                <th class="text-light bg-primary">Metode Pembayaran</th>
                <th class="text-light bg-primary">Aksi</th>
            </tr>
        </thead>
        <tbody>
<?php if (!empty($data_pengeluaran)): ?>
    <?php foreach ($data_pengeluaran as $pengeluaran): ?>
        <tr>
            <td><?= $pengeluaran['pengeluaran_id'] ?></td>
            <td><?= $pengeluaran['tgl_pengeluaran'] ?></td>
            <td><?= $pengeluaran['kategori'] ?></td>
            <td><?= $pengeluaran['nama_barang'] ?></td>
            <td><?= $pengeluaran['jumlah'] ?></td>
            <td><?= $pengeluaran['harga_pengeluaran'] ?></td>
            <td><?= $pengeluaran['metode_pembayaran'] ?></td>
            <td>
                <div class="action-buttons">
                    <button type="button" class="btn btn-info" 
                        data-toggle="modal" 
                        data-target="#detailModal"
                        onclick="showDetail(<?= htmlspecialchars(json_encode($pengeluaran)) ?>)">
                        Detail
                    </button>
                    <button class="btn btn-primary" type="button"
                    onclick="editData(<?= htmlspecialchars(json_encode($pengeluaran)) ?>)">Edit</button>

                    <button class="btn btn-danger" type="button"
                        onclick="hapusData('<?= $pengeluaran['pengeluaran_id'] ?>')">Hapus</button>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="8" class="text-center">Data tidak ditemukan.</td>
    </tr>
<?php endif; ?>
</tbody>

    </table>

    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pengeluaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID Pengeluaran</th>
                                <td id="pengeluaran_id"></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td id="tgl_pengeluaran"></td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td id="kategori"></td>
                            </tr>
                            <tr>
                                <th>Nama Barang</th>
                                <td id="nama_barang"></td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td id="jumlah"></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td id="keterangan"></td>
                            </tr>
                            <tr>
                                <th>Metode Pembayaran</th>
                                <td id="metode_pembayaran"></td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td id="harga_pengeluaran"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="crud/update_pengeluaran.php" method="POST">
                    <input type="hidden" id="edit_pengeluaran_id" name="pengeluaran_id">

                    <div class="form-group">
                        <label for="edit_tgl_pengeluaran">Tanggal Pengeluaran</label>
                        <input type="date" class="form-control" id="edit_tgl_pengeluaran" name="tgl_pengeluaran" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_kategori">Kategori</label>
                        <input type="text" class="form-control" id="edit_kategori" name="kategori" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="edit_nama_barang" name="nama_barang" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="edit_jumlah" name="jumlah" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_metode_pembayaran">Metode Pembayaran</label>
                        <select class="form-control" id="edit_metode_pembayaran" name="metode_pembayaran" required>
                            <option value="Cash">Cash</option>
                            <option value="Transfer">Transfer</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit_harga_pengeluaran">Harga</label>
                        <input type="number" class="form-control" id="edit_harga_pengeluaran" name="harga_pengeluaran" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_keterangan">Keterangan</label>
                        <textarea class="form-control" id="edit_keterangan" name="keterangan"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>


          <script>
          // Fungsi untuk menampilkan detail pengeluaran
          function showDetail(pengeluaran) {
              document.getElementById('pengeluaran_id').textContent = pengeluaran.pengeluaran_id;
              document.getElementById('tgl_pengeluaran').textContent = pengeluaran.tgl_pengeluaran;
              document.getElementById('kategori').textContent = pengeluaran.kategori;
              document.getElementById('nama_barang').textContent = pengeluaran.nama_barang;
              document.getElementById('jumlah').textContent = pengeluaran.jumlah;
              document.getElementById('keterangan').textContent = pengeluaran.keterangan;
              document.getElementById('metode_pembayaran').textContent = pengeluaran.metode_pembayaran;
              document.getElementById('harga_pengeluaran').textContent = pengeluaran.harga_pengeluaran;
          }

          // Fungsi untuk menampilkan data pengeluaran di modal edit
          function editData(pengeluaran) {
              // Set the form fields with the current data
              document.getElementById('edit_pengeluaran_id').value = pengeluaran.pengeluaran_id;
              document.getElementById('edit_tgl_pengeluaran').value = pengeluaran.tgl_pengeluaran;
              document.getElementById('edit_kategori').value = pengeluaran.kategori;
              document.getElementById('edit_nama_barang').value = pengeluaran.nama_barang;
              document.getElementById('edit_jumlah').value = pengeluaran.jumlah;
              document.getElementById('edit_metode_pembayaran').value = pengeluaran.metode_pembayaran;
              document.getElementById('edit_harga_pengeluaran').value = pengeluaran.harga_pengeluaran;
              document.getElementById('edit_keterangan').value = pengeluaran.keterangan;

              // Show the modal
              $('#editModal').modal('show');
          }


// Fungsi untuk menghapus data pengeluaran
function hapusData(id) {
    if (!confirm('Apakah Anda yakin ingin menghapus pengeluaran ini?')) {
        return;
    }

    let xhttp = new XMLHttpRequest();
    let formData = new FormData();
    formData.append('id', id);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                try {
                    let response = JSON.parse(this.responseText);
                    if (response.success) {
                        alert('Data berhasil dihapus');
                        window.location.reload(); // Refresh halaman
                    } else {
                        alert('Gagal menghapus data: ' + response.message);
                    }
                } catch (error) {
                    alert('Terjadi kesalahan dalam memproses data.');
                    console.error(error);
                }
            } else {
                alert('Permintaan gagal. Silakan coba lagi.');
            }
        }
    };

    xhttp.open('POST', 'crud/hapus_pengeluaran.php', true);
    xhttp.send(formData);
}
</script>
