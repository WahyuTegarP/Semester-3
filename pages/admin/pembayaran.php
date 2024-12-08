<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
        }

        .container {
            max-width: 800px;
            background-color: #fff;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        label {
            flex-basis: 30%;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            flex-basis: 65%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[disabled] {
            background-color: #f5f5f5;
        }

        button {
            width: 100%;
            padding: 15px;
            font-size: 18px;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .btn-container {
            text-align: center;
        }
    </style>

    <body>
        <div class="container">
            <h1>Pembayaran Sewa Kamera</h1>
            <form id="paymentForm">
                <!-- Nama Penyewa -->
                <div class="form-group">
                    <label for="namaPenyewa">Nama Penyewa</label>
                    <input type="text" id="namaPenyewa" placeholder="Masukkan nama lengkap" required>
                </div>

                <!-- Pilih Kamera -->
                <div class="form-group">
                    <label for="jenisKamera">Jenis Kamera</label>
                    <select id="jenisKamera" required>
                        <option value="Sony A7 III">Sony A7 III - Rp 250.000/hari</option>
                        <option value="Canon EOS R5">Canon EOS R5 - Rp 300.000/hari</option>
                        <option value="Nikon Z6 II">Nikon Z6 II - Rp 275.000/hari</option>
                    </select>
                </div>

                <!-- Jumlah Hari -->
                <div class="form-group">
                    <label for="jumlahHari">Jumlah Hari</label>
                    <input type="number" id="jumlahHari" min="1" placeholder="Masukkan jumlah hari" required>
                </div>

                <!-- Metode Pembayaran -->
                <div class="form-group">
                    <label for="metodePembayaran">Metode Pembayaran</label>
                    <select id="metodePembayaran" required>
                        <option value="Bank Transfer">Bank Transfer</option>
                        <option value="E-Wallet">E-Wallet (Gopay, OVO, Dana)</option>
                        <option value="Kartu Kredit">Kartu Kredit</option>
                    </select>
                </div>

                <!-- Total Harga -->
                <div class="form-group">
                    <label for="totalHarga">Total Harga</label>
                    <input type="text" id="totalHarga" disabled>
                </div>

                <!-- Tombol Bayar -->
                <div class="btn-container">
                    <button type="button" id="btnBayar">Bayar Sekarang</button>
                </div>
            </form>
        </div>

        <script>
            const hargaKamera = {
                'Sony A7 III': 250000,
                'Canon EOS R5': 300000,
                'Nikon Z6 II': 275000
            };

            document.addEventListener('DOMContentLoaded', () => {
                const jenisKamera = document.getElementById('jenisKamera');
                const jumlahHari = document.getElementById('jumlahHari');
                const totalHarga = document.getElementById('totalHarga');
                const btnBayar = document.getElementById('btnBayar');

                jumlahHari.addEventListener('input', hitungTotalHarga);
                jenisKamera.addEventListener('change', hitungTotalHarga);

                function hitungTotalHarga() {
                    const jenis = jenisKamera.value;
                    const hari = parseInt(jumlahHari.value) || 0;

                    if (hari > 0 && jenis) {
                        const harga = hargaKamera[jenis] * hari;
                        totalHarga.value = `Rp ${formatRupiah(harga)}`;
                    } else {
                        totalHarga.value = '';
                    }
                }

                function formatRupiah(angka) {
                    return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }

                btnBayar.addEventListener('click', function () {
                    const nama = document.getElementById('namaPenyewa').value;
                    const kamera = jenisKamera.value;
                    const hari = jumlahHari.value;
                    const metode = document.getElementById('metodePembayaran').value;

                    if (nama && kamera && hari && metode) {
                        alert(`
                            Pembayaran berhasil!
                            Nama Penyewa: ${nama}
                            Kamera: ${kamera}
                            Jumlah Hari: ${hari} hari
                            Metode Pembayaran: ${metode}
                            Total Harga: ${totalHarga.value}
                        `);
                        document.getElementById('paymentForm').reset();
                        totalHarga.value = '';
                    } else {
                        alert('Harap lengkapi semua data pembayaran.');
                    }
                });
            });
        </script>
    </body>
</div>
