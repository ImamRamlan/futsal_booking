<!-- resources/views/pelanggan/pemesanan/pesan.php -->

<?= $this->extend('templatess/index'); ?>

<?= $this->section('page'); ?>
<section class="portfolio">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Booking</h2>
            <p>Formulir Pemesanan Lapangan</p>
        </div>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                    <img src="<?= base_url('uploads/lapangan/' . $lapangan['212359_gambar']); ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4><?= $lapangan['212359_nama_lapangan']; ?></h4>
                        <p><?= $lapangan['212359_harga_per_jam']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 portfolio-item filter-card">
                <?php if ($lapangan['212359_digunakan'] != 1) : ?>
                    <form action="/PesanLapangan/prosesPesan" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_lapangan" value="<?= $lapangan['id_lapangan']; ?>">
                        <div class="form-group">
                            <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                            <input type="date" class="form-control" name="tanggal_pemesanan" id="tanggal_pemesanan" value="<?= date('Y-m-d'); ?>" readonly>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="mulai">Jam Mulai</label>
                                <input type="time" class="form-control" name="mulai" id="mulai" onchange="updateTotalJam()">
                            </div>
                            <div class="col-sm-6">
                                <label for="selesai">Jam Selesai</label>
                                <input type="time" class="form-control" name="selesai" id="selesai" onchange="updateTotalJam()">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="total_jam">Total Jam</label>
                                <input type="text" class="form-control" id="total_jam"disabled>
                            </div>
                            <div class="col-sm-6">
                                <label for="total_harga">Total</label>
                                <input type="text" class="form-control" name="total_harga" id="total_harga" readonly>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Pesan Lapangan</button>
                    </form>
                <?php else : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <h5><i class="icon fas fa-ban">Lapangan sedang digunakan atau dibooking!!<br>Silahkan menunggu untuk melakukan pesan lapangan</h5>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<script>
    function updateTotalJam() {
        var jamMulai = document.getElementById('mulai').value;
        var jamSelesai = document.getElementById('selesai').value;

        if (jamMulai && jamSelesai) {
            var totalJam = calculateTotalJam(jamMulai, jamSelesai);
            document.getElementById('total_jam').value = totalJam;

            // Update juga total harga
            updateTotalHarga();
        }
    }

    function calculateTotalJam(jamMulai, jamSelesai) {
        var timeMulai = new Date('2020-01-01 ' + jamMulai);
        var timeSelesai = new Date('2020-01-01 ' + jamSelesai);

        var diffMilliseconds = timeSelesai - timeMulai;
        var diffHours = diffMilliseconds / (1000 * 60 * 60);

        return diffHours.toFixed(2);
    }

    function updateTotalHarga() {
        var hargaPerJam = <?= $lapangan['212359_harga_per_jam']; ?>;
        var lamaWaktu = document.getElementById('total_jam').value;
        var totalHarga = hargaPerJam * lamaWaktu;
        document.getElementById('total_harga').value = totalHarga;
    }
</script>

<?= $this->endSection(); ?>
