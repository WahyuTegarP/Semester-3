<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-1">
  </div>

  <?php
  include 'C:\laragon\www\PROJECT\Semester-3\pages\admin\koneksi.php';

  $cari = isset($_GET['cari']) ? strtolower(trim($_GET['cari'])) : '';

  $sql = $cari !== '' ? 
    "SELECT * FROM transaksi 
     WHERE LOWER(invoice) LIKE '%$cari%' 
        OR LOWER(nama_penyewa) LIKE '%$cari%' 
        OR LOWER(nama_product) LIKE '%$cari%'
     ORDER BY tgl_transaksi DESC" : 
    "SELECT * FROM transaksi ORDER BY tgl_transaksi DESC";

  $result = $koneksi->query($sql);

  $data_penjualan = [];
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $data_penjualan[] = $row;
      }
  }
  ?>

<h2>Data Pelanggan</h2>

<!-- Form Pencarian -->
<form class="d-none d-sm-inline-block form-inline my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <!-- Menggunakan kelas bg-white dari Bootstrap -->
        <input type="text" class="form-control bg-white border-0 small" placeholder="Search for..." aria-label="Search"
            aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

<table class="table table-striped table-hover my-4">
  <thead>
    <tr>
      <th class="bg-primary text-white">Id</th>
      <th class="bg-primary text-white">Nama</th>
      <th class="bg-primary text-white">Tanggal Transaksi</th>
      <th class="bg-primary text-white">Jaminan</th>
      <th class="bg-primary text-white">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($data_penjualan)): ?>
      <?php foreach ($data_penjualan as $transaksi): ?>
        <tr>
          <td><?= $transaksi['transaksi_id'] ?></td>
          <td><?= $transaksi['nama_penyewa'] ?></td>
          <td><?= $transaksi['tgl_transaksi'] ?></td>
          <td><?= $transaksi['barang_jaminan'] ?></td>
          <td>
            <button type="button" class="btn btn-info" 
                    data-toggle="modal" 
                    data-target="#detailModal"
                    onclick="showDetail(<?= htmlspecialchars(json_encode($transaksi)) ?>)">
              Detail
            </button>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="8" style="text-align: center;">Data tidak ditemukan.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <th>ID Transaksi</th>
              <td id="transaksi_id"></td>
            </tr>
            <tr>
              <th>ID Produk</th>
              <td id="product_id"></td>
            </tr>
            <tr>
              <th>Nama Penyewa</th>
              <td id="nama_penyewa"></td>
            </tr>
            <tr>
              <th>Produk</th>
              <td id="nama_product"></td>
            </tr>
            <tr>
              <th>Tanggal Transaksi</th>
              <td id="tgl_transaksi"></td>
            </tr>
            <tr>
              <th>Jumlah Produk</th>
              <td id="jumlah_product"></td>
            </tr>
            <tr>
            <tr>
              <th>Harga Sewa</th>
              <td id="harga_sewa"></td>
            </tr>
              <th>Jaminan</th>
              <td id="barang_jaminan"></td>
            </tr>
            <tr>
              <th>Metode Pembayaran</th>
              <td id="metode_transaksi"></td>
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

<script>
function showDetail(transaksi) {
document.getElementById('transaksi_id').textContent = transaksi.transaksi_id;
document.getElementById('product_id').textContent = transaksi.product_id;
document.getElementById('nama_penyewa').textContent = transaksi.nama_penyewa;
document.getElementById('nama_product').textContent = transaksi.nama_product;
document.getElementById('tgl_transaksi').textContent = transaksi.tgl_transaksi;
document.getElementById('jumlah_product').textContent = transaksi.jumlah_product;
document.getElementById('harga_sewa').textContent = transaksi.harga_sewa;
document.getElementById('barang_jaminan').textContent = transaksi.barang_jaminan;
document.getElementById('metode_transaksi').textContent = transaksi.metode_transaksi;
}
</script>