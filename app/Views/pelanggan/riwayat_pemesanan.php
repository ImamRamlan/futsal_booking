<?= $this->extend('templatess/index'); ?>

<?= $this->section('page'); ?>
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Riwayat Pemesanan</h2>
            <ol>
                <li><a href="/pelanggan">Beranda</a></li>
                <li>Riwayat Pemesanan</li>
            </ol>
        </div>
    </div>
</section>
<section class="team">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Riwayat Pemesanan</h2>
            <p>Daftar Pemesanan Anda</p>
        </div>
        <a href="/berandapelanggan" class="btn btn-outline-primary">Kembali</a><br><br>
        <div class="row">
            <?php if (empty($riwayatPemesanan)) : ?>
                <div class="col-md">
                    <p>Belum ada riwayat pemesanan.</p>
                </div>

                <div class="col-md d-flex align-items-stretch">
                <?php else : ?>
                    <?php foreach ($riwayatPemesanan as $row) : ?>
                        <div class="card" style="width: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title">ID Pemesanan: <?= $row['id_pemesanan']; ?></h5>
                                <p class="card-text">
                                    Tanggal Pemesanan: <?= $row['212359_tanggal_pemesanan']; ?><br>
                                    Lama Waktu: <?= $row['212359_lama_waktu']; ?> jam<br>
                                    Total Harga: Rp <?= $row['212359_total_harga']; ?><br>
                                    Status Pemesanan: <?= $row['212359_status_pemesanan']; ?><br>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>

        </div>
    </div>
</section>
<?= $this->endSection(); ?>