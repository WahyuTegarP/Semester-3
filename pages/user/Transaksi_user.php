
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-animate {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .btn-animate:hover {
            background-color: #198754;
            color: #fff;
        }

        .btn-animate::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.1);
            z-index: 1;
            transform: scale(0);
            transition: transform 0.3s ease-in-out;
        }

        .btn-animate:hover::after {
            transform: scale(1);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card fade-in p-4">
            <h2>Transaksi</h2>
            <form method="POST" enctype="multipart/form-data" action="?hal=submit">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama_penyewa" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Produk</label>
                    <select name="item" class="nama_product" required>
                        <option value="10">Sony A7 Mark III</option>
                        <option value="8">Sony A7 Mark II</    option>
                        <option value="9">Sony A6400</option>
                        <option value="Camera">Sony FX30</option>
                        <option value="14">Lensa Sony 50mm FE F1.8</option>
                        <option value="13">Lensa Sony 35mm E F1.8</option>
                        <option value="12">Lensa Sony 28-70mm FE F3.5-5.6</option>
                        <option value="16">Lensa Sony Sigma 16mm E F1.4</option>
                        <option value="Tripod">Tripod Excel</option>
                        <option value="7">Gimbal Feiyu Scorp Pro</option>
                        <option value="6">Gimbal DJI RS 3 Mini</option>
                        <option value="3">Mic Saramonic Blink 500 Putih</option>
                        <option value="4">Mic Shotgun Sony A7 Mark III</option>
                        <option value="1">Baterai Sony NP-FZ100</option>
                        <option value="2">Baterai Sony NP-FW50</option>
                        <option value="5">DJI Mavic Mini 2</option>
                    </select>
                </div>
                <div class="mb-3">
    <label class="form-label">Tanggal Transaksi</label>
    <input type="date" name="tgl_transaksi" class="form-control" required>
</div>
                <div class="mb-3">
                    <label class="form-label">Jam Pengembalian</label>
                    <input type="text" name="jam_pengembalian" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jaminan</label>
                    <input type="text" name="barang_jaminan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Metode Pembayaran</label>
                    <select name="metode_transaksi" class="form-select" required>
                        <option value="Cash">Cash</option>
                        <option value="Transfer">Transfer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="guarantee_photo" class="form-label">Bukti Jaminan</label>
                    <input type="file" class="form-control" id="bukti_gambar" name="bukti_gambar" accept="image/*" required>
                </div>
                <button type="?hal=Hasil_Transaksi" class="btn btn-primary btn-animate">Submit</button>
                <a href="?hal=beranda" class="btn btn-secondary btn-animate">Kembali</a>
            </form>
        </div>
    </div>
</body>