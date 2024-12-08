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

    <style>
    /* Styling untuk tabel dan elemen-elemen lainnya */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        border-radius: 10px;
        overflow: hidden;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px;
        text-align: center;
    }

    th {
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
    }

    td {
        background-color: #f9f9f9;
    }

    tr:nth-child(even) td {
        background-color: #f2f2f2;
    }

    tr:hover td {
        background-color: #ddd;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .action-buttons button {
        padding: 6px 12px;
        font-size: 14px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
    }

    .btn-edit {
        background-color: #4CAF50;
        color: white;
    }

    .btn-delete {
        background-color: #f44336;
        color: white;
    }

    .btn-view {
        background-color: #2196F3;
        color: white;
    }

    .search-box {
        margin-bottom: 20px;
        display: flex;
        justify-content: flex-start; /* Mengubah posisi ke kiri */
        align-items: center;
    }

    .search-box input {
        padding: 6px;
        width: 260px; /* Lebih kecil sedikit */
        border-radius: 5px;
        border: 1px solid #ddd;
        margin-right: 10px;
    }

    .search-box button {
        padding: 6px 16px;
        background-color: #4e73df;
        border: none;
        color: white;
        cursor: pointer;
        border-radius: 5px;
    }

    .search-box button:hover {
        background-color: #0056b3;
    }

    .search-box input:focus,
    .search-box button:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
    </style>

    <h3>Data Pengeluaran</h3>

    <!-- Form Pencarian -->
    <form method="GET" class="search-box">
        <input type="text" name="cari" placeholder="Cari (nama_barang, tgl_pengeluaran)"
            value="<?= htmlspecialchars($cari) ?>">
        <button type="submit">Cari</button>
    </form>

    <!-- Tabel Data Pengeluaran -->
    <table>
        <thead>
            <tr>
                <th class="text-light bg-primary">Id</th>
                <th class="text-light bg-primary">Tanggal</th>
                <th class="text-light bg-primary">Kategori</th>
                <th class="text-light bg-primary">Nama Barang</th>
                <th class="text-light bg-primary">Jumlah</th>
                <th class="text-light bg-primary">Metode Pembayaran</th>
                <th class="text-light bg-primary">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($data_pengeluaran)): ?>
            <?php foreach ($data_pengeluaran as $pengeluaran): ?>
                    <tr>
                        <td><?= $pengeluaran['id_pengeluaran'] ?></td>
                        <td><?= $pengeluaran['tgl_pengeluaran'] ?></td>
                        <td><?= $pengeluaran['kategori'] ?></td>
                        <td><?= $pengeluaran['nama_barang'] ?></td>
                        <td><?= $pengeluaran['jumlah'] ?></td>
                        <td><?= $pengeluaran['metode_pembayaran'] ?></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-info" type="button"
                                    onclick="confirmDetail(<?= $pengeluaran['id_pengeluaran'] ?>)">Detail</button>
                                <button class="btn btn-primary" type="button"
                                    onclick="window.location.href='edit.php?id_pengeluaran=<?= $pengeluaran['id_pengeluaran'] ?>'">Edit</button>
                                <button class="btn btn-danger " type="button"
                                    onclick="if(confirm('Apakah Anda yakin ingin menghapus transaksi ini?')) window.location.href='hapus.php?id_pengeluaran=<?= $pengeluaran['id_pengeluaran'] ?>'">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align: center;">Data tidak ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
    function confirmDetail(id) {
        var userConfirmed = confirm("Apakah Anda yakin ingin melihat detail pengeluaran ini?");
        if (userConfirmed) {
            window.location.href = 'detail.php?id_pengeluaran=' + id;
        }
    }
</script>
