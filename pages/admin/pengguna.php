<!-- Begin Page Content -->
<div class="container-fluid">
    <h2 class="m-0 font-weight-bold text-primary">Data Pengguna</h2>
    <br>

    <?php
    // Koneksi ke database
    include 'C:\laragon\www\PROJECT\Semester-3\pages\admin\koneksi.php';

    // Ambil data pencarian dari parameter URL
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    // Query SQL untuk mengambil data pengguna dengan kondisi pencarian
    if ($search) {
        // Query dengan kondisi pencarian berdasarkan nama dan email
        $sql = "SELECT * FROM user WHERE nama LIKE '%$search%' OR email LIKE '%$search%'";
    } else {
        // Query tanpa kondisi pencarian jika tidak ada input pencarian
        $sql = "SELECT * FROM user";
    }

    // Eksekusi query
    $result = $koneksi->query($sql);

    // Ambil semua data pengguna
    $data_pengguna = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data_pengguna[] = $row;
        }
    }
    ?>

    <style>
        /* Styling tetap sama */
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

        .form-inline {
            margin-left: 2px; /* Ubah nilai sesuai kebutuhan */
        }
    </style>

    <!-- Tombol Pencarian Baru -->
   <!-- Form Pencarian -->
<form class="d-none d-sm-inline-block form-inline my-2 my-md-0 mw-100 navbar-search" method="GET" action="<?= $_SERVER['PHP_SELF']; ?>">
    <div class="input-group">
        <input type="text" name="search" class="form-control bg-white border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="searchInput" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button" onclick="searchData()">
                <i class="fas fa-search fa-sm"></i> Cari
            </button>
        </div>
    </div>
</form>


    <script>
        // Fungsi untuk mengirimkan form pencarian
        function searchData() {
        var searchValue = document.getElementById('searchInput').value;
        if (searchValue) {
            window.location.href = '<?= $_SERVER['PHP_SELF']; ?>?search=' + searchValue + '&hal=pengguna';
        } else {
            alert("Masukkan kata kunci pencarian.");
        }
    }
    </script>

    <!-- Tabel Data Pengguna -->
    <table>
        <thead>
            <tr>
                <th style="text-align: center;" class="text-light bg-primary">User ID</th>
                <th style="text-align: center;" class="text-light bg-primary">Nama</th>
                <th style="text-align: center;" class="text-light bg-primary">Email</th>
                <th style="text-align: center;" class="text-light bg-primary">Status</th>
                <th style="text-align: center;" class="text-light bg-primary">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data_pengguna)): ?>
                <?php foreach ($data_pengguna as $user): ?>
                    <tr>
                        <td><?= $user['user_id'] ?></td>
                        <td><?= $user['nama'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['Status'] ?></td>
                        <td>
                            <div class="action-buttons">
                                <button type="button" class="btn btn-warning btn-sm" 
                                    onclick="editUser('<?= $user['user_id'] ?>', '<?= $user['nama'] ?>', '<?= $user['email'] ?>', '<?= $user['Status'] ?>', '<?= $user['password'] ?>')">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>

                                <button class="btn-delete" type="button"
                                onclick="if(confirm('Apakah Anda yakin ingin menghapus pengguna ini?')){hapusData(<?= $user['user_id'] ?>)}">Hapus</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center;">Data tidak ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Modal Edit Data -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk menyimpan perubahan -->
                    <form id="editForm" method="POST" action="">
                        <div class="mb-3">
                            <label for="editUserId" class="form-label">User ID</label>
                            <input type="text" class="form-control" id="editUserId" name="user_id" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editNama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="editNama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPassword" class="form-label">Password</label>
                            <input type="text" class="form-control" id="editPassword" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="editStatus" class="form-label">Status</label>
                            <input type="text" class="form-control" id="editStatus" name="status" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let
        // Fungsi untuk membuka modal edit dengan data pengguna
        function editUser(userId, nama, email, status, password) {
            document.getElementById('editUserId').value = userId;
            document.getElementById('editNama').value = nama;
            document.getElementById('editEmail').value = email;
            document.getElementById('editStatus').value = status;
            document.getElementById('editPassword').value = password;

            // Tampilkan modal
            var modal = new bootstrap.Modal(document.getElementById('editModal'));
            modal.show();
        }

        function editData(id) {
            let xhttp = new XMLHttpRequest();
            let formData = new FormData();

            formData.append('id', id);

            xhttp.onreadystatechange = function() {
                if(this.status == 200 && this.readyState == 4) {
                    console.log(this.responseText);
                }
            };

            xhttp.open("POST", "crud/hapus_pengguna.php", true);
            xhttp.send(formData);
        }

        function hapusData(id) {
            let xhttp = new XMLHttpRequest();
            let formData = new FormData();

            formData.append('id', id);

            xhttp.onreadystatechange = function() {
                if(this.status == 200 && this.readyState == 4) {
                    console.log(this.responseText);
                }
            };

            xhttp.open("POST", "crud/hapus_pengguna.php", true);
            xhttp.send(formData);
        }
    </script>

</div>
<!-- End Page Content -->