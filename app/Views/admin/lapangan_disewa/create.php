<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <h2>Tambah Data Lapangan Disewa</h2>

    <form action="/LapanganDisewaController/store" method="post">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="id_lapangan" class="form-label">Nama Lapangan</label>
            <select name="id_lapangan" id="" class="form-control">
            <?php foreach ($lapangan as $row) : ?>
                <option value="<?= $row['id_lapangan'];?>"><?= $row['212359_nama_lapangan'];?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal_sewa" class="form-label">Tanggal Sewa</label>
            <input type="date" class="form-control" id="tanggal_sewa" name="tanggal_sewa" required>
        </div>
        <div class="mb-3">
            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
            <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
        </div>
        <div class="mb-3">
            <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
            <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" required>
        </div>

        <input type="hidden" class="form-control" id="status_sewa" name="status_sewa" value="Sedang Disewa" required>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?= $this->endSection(); ?>