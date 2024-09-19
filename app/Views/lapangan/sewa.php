<?= $this->extend('templatess/index'); ?>

<?= $this->section('page'); ?>
<section class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Sedang DigunakaN</h2>
            <p>Daftar Lapangan</p>
        </div>
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php foreach ($lapanganDisewa as $ds) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="<?= base_url('uploads/lapangan/' . $ds['212359_gambar']); ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $ds['212359_nama_lapangan']; ?></h4>
                            <p><?= $ds['212359_harga_per_jam']; ?></p>
                            <div class="portfolio-links">
                                <a href="<?= base_url('uploads/lapangan/' . $ds['212359_gambar']) ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" 
                                title="
                                <?= $ds['212359_nama_lapangan']; ?><br>
                                Tanggal Sewa : <?= $ds['212359_tanggal_sewa']; ?><br>
                                Waktu Mulai : <?= $ds['212359_waktu_mulai']; ?><br>
                                Waktu Selesai : <?= $ds['212359_waktu_selesai']; ?><br>
                                "><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>