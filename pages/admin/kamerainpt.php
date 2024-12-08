<div class="row">
    <div class="col-lg-12">
        <!-- Tabel Alat -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h2 class="m-0 font-weight-bold text-primary">Daftar Kamera</h2>
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addDataModal">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Alat</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kamera DSLR</td>
                                <td>Kamera</td>
                                <td>Tersedia</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Detail</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Mirrorless</td>
                                <td>Kamera</td>
                                <td>Tidak Tersedia</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Detail</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Drone</td>
                                <td>Videografi</td>
                                <td>Tersedia</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Detail</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Kamera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaAlat">Nama Kamera</label>
                        <input type="text" class="form-control" id="namaAlat" name="namaAlat" placeholder="Masukkan Nama Alat" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Fotografi">Fotografi</option>
                            <option value="Videografi">Videografi</option>
                            <option value="Aksesori">Aksesori</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
