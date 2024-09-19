<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Pemesanan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Data Pemesanan</a></li>
                    <li class="breadcrumb-item active">List Pemesanan</li>
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
                        <?php if (isset($success)) : ?>
                            <div class="alert alert-success">
                                <?= $success ?>
                            </div>
                        <?php endif; ?>
                        <a href="/LapanganDisewaController/create" class="btn btn-success mt-3"><i class="fas fa-plus-square"></i> Tambah Pemesanan</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Lapangan</th>
                                    <th>Tanggal Sewa</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Status Sewa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($lapanganDisewa as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['212359_nama_lapangan']; ?></td>
                                        <td><?= $row['212359_tanggal_sewa']; ?></td>
                                        <td><?= $row['212359_waktu_mulai']; ?></td>
                                        <td><?= $row['212359_waktu_selesai']; ?></td>
                                        <td><?= $row['212359_status_sewa']; ?></td>
                                        <td>
                                            <a href="<?= base_url("/LapanganDisewaController/edit/{$row['id_sewa']}"); ?>" class="btn btn-warning">Edit</a>
                                            <a href="<?= base_url("/LapanganDisewaController/delete/{$row['id_sewa']}"); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>