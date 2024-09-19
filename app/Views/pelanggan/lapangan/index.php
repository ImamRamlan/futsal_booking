<?= $this->extend('templatess/index'); ?>

<?= $this->section('page'); ?>
<section class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Booking</h2>
            <p>Daftar Lapangan</p>
        </div>
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php foreach ($lapangan as $ds) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="<?= base_url('uploads/lapangan/' . $ds['212359_gambar']); ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $ds['212359_nama_lapangan']; ?></h4>
                            <p><?= $ds['212359_harga_per_jam']; ?></p>
                            <div class="portfolio-links">
                                <a href="<?= base_url('uploads/lapangan/' . $ds['212359_gambar']) ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="
                                <?= $ds['212359_nama_lapangan']; ?><br>
                                Deskripsi : <?= $ds['212359_deskripsi']; ?>
                                "><i class="bx bx-plus"></i></a>
                                <a href="/PesanLapangan/pesan/<?= $ds['id_lapangan']; ?>" title="Pesan Lapangan"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                        
                    </div>
                    <p class="text-center"><?= $ds['212359_deskripsi']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>