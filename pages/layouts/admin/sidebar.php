<!-- Sidebar -->
<style>
  .fixed-sidebar {
  position: fixed; /* Sidebar tetap di tempat */
  top: 0;
  left: 0;
  width: 250px; Lebar sidebar
  height: 100vh; /* Tinggi layar penuh */
  overflow: hidden; /* Tidak dapat di-scroll */
  z-index: 1030; Di atas elemen lainnya
}

body {
  /* margin: 0;
  padding: 0;
  font-family: Arial, sans-serif; */
  padding-left: 220px; 
}

</style>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion fixed-sidebar" id="accordionSidebar">
  <!-- Sidebar - Merek -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-camera"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin Kamera</div>
  </a>
  <!-- Pembatas -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="nav-item ">
    <a class="nav-link" href="?hal=dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
    Barang
  </div>
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Input Barang</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="?hal=kamerainpt">Kamera</a>
        <a class="collapse-item" href="?hal=alat">Alat-Alat</a>
      </div>
    </div>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Penjualan
  </div>

  <!-- Item Navigasi - Menu Halaman -->
  <li class="nav-item">
      <a class="nav-link" href="?hal=grafik">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Detail Grafik</span>
    </a>
    
  </li>

  <!-- Item Navigasi - Grafik -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
      aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Data Penjualan</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Layar Masuk:</h6>
        <a class="collapse-item" href="?hal=datatransaksi">Data Transaksi</a>
        <a class="collapse-item" href="?hal=datapelanggan">Data Pelanggan</a>
        <a class="collapse-item" href="?hal=databarangsewa">Data Barang Sewa</a>
        <div class="collapse-divider"></div>
      </div>
    </div>
  </li>

  <hr class="sidebar-divider d-none d-md-block">
  <div class="sidebar-heading">
    Pengguna
  </div>
  <!-- Item Navigasi - Tabel -->
  <li class="nav-item">
    <a class="nav-link" href="?hal=pengguna">
      <i class="fas fa-fw fa-table"></i>
      <span>Data Pengguna</span>
    </a>
  </li>

  <hr class="sidebar-divider d-none d-md-block">
  <div class="sidebar-heading">
    Pengeluaran
  </div>
  <!-- Item Navigasi - Tabel -->
  <li class="nav-item">
    <a class="nav-link" href="?hal=pengeluaran">
      <i class="fas fa-fw fa-table"></i>
      <span>Data Pengeluaran</span>
    </a>
  </li>

  <!-- Pembatas -->

  <!-- Pengubah Sidebar -->
  <!-- <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div> -->
</ul>

<!-- End of Sidebar -->
