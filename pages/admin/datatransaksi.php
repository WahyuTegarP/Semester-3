<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
    </div>

    <?php
    // Sambungkan ke database
    include 'C:\laragon\www\PROJECT\Semester-3\pages\admin\koneksi.php'; // Sesuaikan path file koneksi

    // Ambil parameter pencarian
    $cari = isset($_GET['cari']) ? strtolower(trim($_GET['cari'])) : '';

    // Query untuk mengambil data transaksi
    if ($cari !== '') {
        $sql = "SELECT * FROM transaksi 
                WHERE LOWER(invoice) LIKE '%$cari%' 
                OR LOWER(nama_penyewa) LIKE '%$cari%' 
                OR LOWER(nama_product) LIKE '%$cari%'
                ORDER BY tgl_transaksi DESC";
    } else {
        $sql = "SELECT * FROM transaksi ORDER BY tgl_transaksi DESC";
    }

    // Eksekusi query
    $result = $koneksi->query($sql);

    // Simpan hasil transaksi dalam array
    $data_penjualan = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data_penjualan[] = $row;
        }
    }
    ?>

<style>
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

    <h2>Data Transaksi</h2>

    <!-- Form Pencarian -->
    <form method="GET" class="search-box" action="">
    <input type="text" name="cari" placeholder="Cari (Invoice, Pelanggan, Produk)"
        value="<?= htmlspecialchars($cari) ?>" />
    <button type="submit">Cari</button>
</form>

    <!-- Tabel Data Penjualan -->
    <table>
        <thead>
            <tr>
                <th style="text-align: center;" class="text-light bg-primary">Id</th>
                <th style="text-align: center;" class="text-light bg-primary">Nama</th>
                <th style="text-align: center;" class="text-light bg-primary">Produk</th>
                <th style="text-align: center;" class="text-light bg-primary">Tanggal Transaksi</th>
                <th style="text-align: center;" class="text-light bg-primary">Jaminan</th>
                <th style="text-align: center;" class="text-light bg-primary">Total Harga</th>
                <th style="text-align: center;" class="text-light bg-primary">Metode Pembayaran</th>
                <th style="text-align: center;" class="text-light bg-primary">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data_penjualan)): ?>
                <?php foreach ($data_penjualan as $transaksi): ?>
                    <tr>
                        <td><?= $transaksi['transaksi_id'] ?></td>
                        <td><?= $transaksi['nama_penyewa'] ?></td>
                        <td><?= $transaksi['nama_product'] ?></td>
                        <td><?= $transaksi['tgl_transaksi'] ?></td>
                        <td><?= $transaksi['barang_jaminan'] ?></td>
                        <td><?= number_format($transaksi['jumlah_product'] * $transaksi['harga_sewa'], 0, ',', '.') ?></td>
                        <td><?= $transaksi['metode_transaksi'] ?></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-info" type="button"
                                    onclick="window.location.href='detail.php?invoice=<?= $transaksi['transaksi_id'] ?>'">Detail</button>
                                <button class="btn btn-primary" type="button"
                                    onclick="window.location.href='edit.php?invoice=<?= $transaksi['transaksi_id'] ?>'">Edit</button>
                                <button class="btn btn-danger" type="button"
                                    onclick="if(confirm('Apakah Anda yakin ingin menghapus transaksi ini?')) window.location.href='hapus.php?invoice=<?= $transaksi['transaksi_id'] ?>'">Hapus</button>
                            </div>
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
</div>
