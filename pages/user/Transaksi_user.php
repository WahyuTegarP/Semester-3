
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
            <form method="POST" enctype="multipart/form-data" action="submit.php">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="Nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Produk</label>
                    <select name="item" class="Produk" required>
                        <option value="Ca   mera">Sony A7 Mark III</option>
                        <option value="Camera">Sony A7 Mark II</    option>
                        <option value="Camera">Sony A6400</option>
                        <option value="Camera">Sony FX30</option>
                        <option value="Lens">Lensa Sony 50mm FE F1.8</option>
                        <option value="Lens">Lensa Sony 35mm E F1.8</option>
                        <option value="Lens">Lensa Sony 28-70mm FE F3.5-5.6</option>
                        <option value="Lens">Lensa Sony Sigma 16mm E F1.4</option>
                        <option value="Tripod">Tripod Excel</option>
                        <option value="Accessories">Gimbal Feiyu Scorp Pro</option>
                        <option value="Accessories">Gimbal DJI RS 3 Mini</option>
                        <option value="Accessories">Mic Saramonic Blink 500 Putih</option>
                        <option value="Accessories">Mic Shotgun Sony A7 Mark III</option>
                        <option value="Accessories">Baterai Sony NP-FZ100</option>
                        <option value="Accessories">Baterai Sony NP-FW50</option>
                        <option value="Drone">DJI Mavic Mini 2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="Alamat" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Transaksi</label>
                    <input type="text" name="Tanggal_Transaksi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Kembali</label>
                    <input type="text" name="Tanggal_Kembali" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jaminan</label>
                    <input type="text" name="Jaminan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Banyaknya</label>
                    <input type="number" name="Banyaknya" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Durasi Sewa</label>
                    <select name="Durasi_Sewa" class="form-select" required>
                        <option value="1 Hari">1 Hari</option>
                        <option value="12 Jam">12 Jam</option>
                        <option value="6 Jam">6 Jam</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Metode Pembayaran</label>
                    <select name="Metode_Pembayaran" class="form-select" required>
                        <option value="Cash">Cash</option>
                        <option value="Transfer">Transfer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="guarantee_photo" class="form-label">Bukti Jaminan</label>
                    <input type="file" class="form-control" id="Bukti_Jaminan" name="Bukti_Jaminan" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary btn-animate">Submit</button>
                <a href="index.php" class="btn btn-secondary btn-animate">Kembali</a>
            </form>
        </div>
    </div>
</body>