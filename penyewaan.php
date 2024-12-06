<?php
require "conn.php";
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form penyewaan</title>
        <script>
            //menentukan harga sewa
            var harga_per_unit ={
                'Baterai Sony NP-FZ100 ' : 80000,
                'Baterai Sony NP-FZ100H' : 50000,
                'Drone Dji Movic' : 450000,
                'Mic Saramonic Blink ' : 60000,
                'Mic Shotgun Sony ' : 90000,
                'Lensa Sony Sigma ' : 140000,
                'Lensa Sony 50MM' : 125000,
                'Lensa Sony 85mm' : 100000,
                'Lensa Sony 35mm' : 85000,
                'Lensa Sony Sigma 16' : 140000,
                'Lensa Sony 28' : 100000,
                'Gimbal DJI RS 3 Mini' : 125000,
                'Gimbal Feiyu Scorp' : 190000,
                'Kamera Sony A7 Mark II' : 250000,
                'Kamera Sony A7 Mark III' : 350000,
                'Kamera Sony A6400 ' : 175000
            };

            function hitungTotal(){
                //mengambil nilai dari input jumlah sewa
                var jumlah_sewa = document.getElementById("jumlah_sewa").value;

                //hitung total harga
                var total_harga = harga_per_unit * jumlah_sewa;

                //menampilkan total harga
                document.getElementById("total_harga").innerText = "Total Harga: Rp " + total_harga.toLocaleString();
            }
        </script>
    </head>
    <body>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama penyawa:</label>
                <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" placeholder="silahkan isi" required></div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="silahkan isi" required></div>
                </div>
                <div class="form-group">
                    <label for="no_telp">No HP:</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="silahkan isi" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_sewa">Jumlah sewa:</label>
                    <input type="number" class="form-control" id="jumlah_sewa" name="jumlah_sewa" required>
                </div>
                <div id="total_harga">Total Harga: Rp 0</div>
                </div>
                <div class="form-group">
                    <label for="tanggal_sewa">Tanggal Sewa:</label>
                    <input type="date" class="form-control" id="tanggal_sewa" name="tgl_sewa" required>
                </div>
                <div class="form-group">
                    <label for="jam_sewa">jam Sewa:</label>
                    <input type="time" class="form-control" id="jam_sewa" name="jam_sewa" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
                    <input type="date" class="form-control" id="tanggal_pengembalian" name="tgl_pengembalian" required>
                </div>
                <div class="form-group">
                    <label for="jam_pengembalian">Jam Pengembalian:</label>
                    <input type="time" class="form-control" id="jam_pengembalian" name="jam_pengembalian" required>
                </div>
                <div class="form-group">
                    <label for="metode_transaksi">Metode Transaksi</label>
                    <select id="metode_transaksi" name="metode_transaksi">
                    <option value="pilih">-- pilih metode pembayaran --</option>
                    <option value="Cash">Cash</option>
                    <option value="Transfer">Transfer</option>
                </select>
                </div>
                <button type="submit" class="btn btn-primary">Sewa</button>
    </body>
</html>