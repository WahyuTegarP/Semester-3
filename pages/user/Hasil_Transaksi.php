<?php
// Database connection
$conn = new mysqli('localhost', 'root', '1234', 'db_sewakamera');

// Fetch transactions
$result = $conn->query("SELECT * FROM transactions");
$total_price = 0;
?>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Rincian Transaksi</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Produk</th>
                    <th>Alamat</th>
                    <th>Tanggal_Transaksi</th>
                    <th>Tanggal_Kembali</th>
                    <th>Jaminan</th>
                    <th>Banyaknya</th>
                    <th>Durasi Sewa</th>
                    <th>Metode_Pembayaran</th>
                    <th>Bukti Jaminan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php $no = 1; ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['Id']) ?></td>
                            <td><?= htmlspecialchars($row['Nama']) ?></td>
                            <td><?= htmlspecialchars($row['Produk']) ?></td>
                            <td><?= htmlspecialchars($row['Alamat']) ?></td>
                            <td><?= htmlspecialchars($row['Tanggal_Transaksi']) ?></td>
                            <td><?= htmlspecialchars($row['Tanggal_Kembali']) ?></td>
                            <td><?= htmlspecialchars($row['Jaminan']) ?></td>
                            <td><?= htmlspecialchars($row['Banyaknya']) ?></td>
                            <td><?= htmlspecialchars($row['Durasi_Sewa']) ?></td>
                            <td><?= htmlspecialchars($row['Metode_Pembayaran']) ?></td>
                            <td>
                                <img src="uploads/<?= htmlspecialchars($row['Bukti_Jaminan']) ?>" alt="Photo" width="100">
                            </td>
                            <td>$<?= number_format($row['Total_Harga'], 2) ?></td>
                        </tr>
                        <?php $total_price += $row['Total_Harga']; ?>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10" class="text-center">Tidak ada transaksi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot class="table-secondary">
                <tr>
                    <td colspan="9" class="text-end"><strong>Total Semua Transaksi:</strong></td>
                    <td><strong>$<?= number_format($Total_Harga, 2) ?></strong></td>
                </tr>
            </tfoot>
        </table>
        <a href="?hal=Transaksi_user" class="btn btn-primary">Tambah Transaksi Baru</a>
        <a href="?hal=beranda" class="btn btn-secondary">Kembali ke Home</a>
    </div>
</body>
