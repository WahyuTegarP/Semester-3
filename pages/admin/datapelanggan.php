<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-1">
  </div>

  <?php
// Data Pelanggan (contoh data)
$data_pelanggan = [
    [
        "id" => "CUST001",
        "nama" => "John Doe",
        "kontak" => "john.doe@example.com | +628123456789",
        "alamat" => "Jl. Contoh No. 1, Jakarta",
        "email" => "john.doe@example.com",
        "tanggal_pendaftaran" => "2024-01-15",
        "status" => "Aktif"
    ],
    [
        "id" => "CUST002",
        "nama" => "Jane Smith",
        "kontak" => "jane.smith@example.com | +628987654321",
        "alamat" => "Jl. Contoh No. 2, Bandung",
        "email" => "jane.smith@example.com",
        "tanggal_pendaftaran" => "2024-02-20",
        "status" => "Aktif"
    ],
    [
        "id" => "CUST003",
        "nama" => "Alice Johnson",
        "kontak" => "alice.johnson@example.com | +628567890123",
        "alamat" => "Jl. Contoh No. 3, Surabaya",
        "email" => "alice.johnson@example.com",
        "tanggal_pendaftaran" => "2024-03-10",
        "status" => "Non-Aktif"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
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
    <h1>Data Pelanggan</h1>

    <!-- Tabel Data Pelanggan -->
    <table>
        <thead>
            <tr>
                <th class="text-light bg-primary">No.</th>
                <th class="text-light bg-primary">Nama</th>
                <th class="text-light bg-primary">Email</th>
                <th class="text-light bg-primary">Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_pelanggan as $pelanggan): ?>
                <tr>
                    <td><?= $pelanggan['id'] ?></td>
                    <td><?= $pelanggan['nama'] ?></td>
                    <td><?= $pelanggan['email'] ?></td>
                    <td><?= $pelanggan['alamat'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
