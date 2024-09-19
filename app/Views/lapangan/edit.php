<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Data Lapangan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Edit Data Lapangan</a></li>
                    <li class="breadcrumb-item active">Edit Lapangan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <a href="/lapangan" class="btn btn-primary">Kembali</a>
                        <form action="/lapangan/update/<?= $lapangan['id_lapangan']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Nama Lapangan</label>
                                <input type="text" class="form-control" name="212359_nama_lapangan" value="<?= $lapangan['212359_nama_lapangan']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label><br>
                                <img src="<?= base_url('uploads/lapangan/' . $lapangan['212359_gambar']); ?>" alt="Lapangan Image" width="200" height="180">
                                <input type="file" class="form-control" name="212359_gambar">
                                <p class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                            </div>
                            <div class="form-group">
                                <label>Harga Per Jam</label>
                                <input type="text" class="form-control" name="212359_harga_per_jam" value="<?= $lapangan['212359_harga_per_jam']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="212359_deskripsi" class="form-control"><?= $lapangan['212359_deskripsi']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Atur Lapangan</label>
                                <select name="212359_digunakan" id="" class="form-control" required>
                                    <option>Pilih</option>
                                    <option value="0" <?= ($lapangan['212359_digunakan'] == 0) ? 'selected' : ''; ?>>Tidak Digunakan</option>
                                    <option value="1" <?= ($lapangan['212359_digunakan'] == 1) ? 'selected' : ''; ?>>Digunakan</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>