<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-1">
  </div>


<?php
// Data Barang yang Disewa (contoh data)
$data_barang_sewa = [
    [
        "invoice" => "1",
        "Npelanggan" => "Abdul Mukarrom",
        "nama_barang" => "Kamera DSLR",
        "kuantitas" => 2,
        "tenggat_waktu" => "2024-12-10",
        "status_pengembalian" => "Belum Kembali"
    ],
    [
        "invoice" => "2",
        "Npelanggan" => "Abdul Mukarrom",
        "nama_barang" => "Tripod",
        "kuantitas" => 3,
        "tenggat_waktu" => "2024-12-08",
        "status_pengembalian" => "Sudah Kembali"
    ],
    [
        "invoice" => "3",
        "Npelanggan" => "Abdul Mukarrom",
        "nama_barang" => "Lensa Kamera",
        "kuantitas" => 1,
        "tenggat_waktu" => "2024-12-12",
        "status_pengembalian" => "Belum Kembali"
    ]
];

// Pencarian
$cari = isset($_GET['cari']) ? strtolower(trim($_GET['cari'])) : '';
$hasil_pencarian = [];

if ($cari !== '') {
    foreach ($data_barang_sewa as $barang_sewa) {
        if (
            strpos(strtolower($barang_sewa['invoice']), $cari) !== false ||
            strpos(strtolower($barang_sewa['nama_barang']), $cari) !== false
        ) {
            $hasil_pencarian[] = $barang_sewa;
        }
    }
} else {
    $hasil_pencarian = $data_barang_sewa;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang Sewa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .search-box {
            margin: 20px 0;
        }
        .search-box input {
            padding: 8px;
            width: 300px;
        }
        .search-box button {
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Data Barang Sewa</h1>

    <!-- Form Pencarian -->
    <form method="GET" class="search-box">
        <input type="text" name="cari" placeholder="Cari (Invoice, Nama Barang)" value="<?= htmlspecialchars($cari) ?>">
        <button type="submit">Cari</button>
    </form>

    <!-- Tabel Data Barang Sewa -->
    <table>
        <thead>
            <tr>
                <th class="text-light bg-primary">No.</th>
                <th class="text-light bg-primary">Nama Pelanggan</th>
                <th class="text-light bg-primary">Nama Barang</th>
                <th class="text-light bg-primary">Kuantitas</th>
                <th class="text-light bg-primary">Tenggat Waktu Pengembalian</th>
                <th class="text-light bg-primary">Status Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($hasil_pencarian) > 0): ?>
                <?php foreach ($hasil_pencarian as $barang_sewa): ?>
                    <tr>
                        <td><?= $barang_sewa['invoice'] ?></td>
                        <td><?= $barang_sewa['Npelanggan'] ?></td>
                        <td><?= $barang_sewa['nama_barang'] ?></td>
                        <td><?= $barang_sewa['kuantitas'] ?></td>x  
                        <td><?= $barang_sewa['tenggat_waktu'] ?></td>
                        <td><?= $barang_sewa['status_pengembalian'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align: center;">Data tidak ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
