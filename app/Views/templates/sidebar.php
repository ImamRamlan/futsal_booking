<aside class="main-sidebar sidebar-light-danger elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link text-center bg-success">

    <span class="brand-text font-weight-light ">Futsal Booking</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url(); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= session()->get('nama'); ?></a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">MAIN NAVIGASI</li>
        <li class="nav-item">
          <a href="/admin" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            Beranda Utama
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            Admin
          </a>
        </li> -->
        <li class="nav-item">
          <a href="/datauser" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            Manajemen Pelanggan
          </a>
        </li>
        <li class="nav-item">
          <a href="/Lapangan" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            Manajemen Lapangan
          </a>
        </li>
        <li class="nav-header">Main Features.</li>
        <li class="nav-item">
          <a href="/Pesanan" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            Pesanan 
          </a>
        </li>
        <li class="nav-item">
          <a href="/LapanganDisewaController" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            Sewa Lapangan
          </a>
        </li>

        <li class="nav-header">LAINNYA.</li>
        <li class="nav-item">
          <a href="/login/logout" class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            Keluar
          </a>
        </li>
      </ul>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>