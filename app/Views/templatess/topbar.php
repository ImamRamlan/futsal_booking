<div class="container d-flex align-items-center justify-content-lg-between">

  <h1 class="logo me-auto me-lg-0"><a href="index.html">FUTSAL<span>.</span></a></h1>
  <nav id="navbar" class="navbar order-last order-lg-0">
    <ul>
      <li>
        <a class="nav-link scrollto " href="<?= base_url('berandapelanggan') ?>">Beranda</a>
      </li>
      <li class="">
        <a class="nav-link scrollto " href="<?= base_url('PesanLapangan') ?>">Pesan Lapangan</a>
      </li>
      <li class="">
        <a class="nav-link scrollto " href="<?= base_url('PesanLapangan/RiwayatPemesanan') ?>">Riwayat Pemesanan</a>
      </li>
      <li class="">
        <a class="nav-link scrollto " href="<?= base_url('LapanganDisewa') ?>">Lapangan Digunakan</a>
      </li>
      <li class="">
        <a class="nav-link scrollto" href="/loginpelanggan/logout" onclick="return confirm('Apakah Anda yakin ingin keluar?')">Keluar</a>
      </li>

    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->
  <a href="#" class="get-started-btn scrollto"><?= session()->get('nama'); ?></a>
</div>