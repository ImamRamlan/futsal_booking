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
                        <form action="/pesanan/printPDF" method="post">
                            <div class="form-group">
                                <label for="start_date">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="form-group">
                                <label for="end_date">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Buat Laporan</button>
                        </form>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Lapangan</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pemesanan as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['212359_nama_lengkap']; ?></td>
                                        <td><?= $row['212359_nama_lapangan']; ?></td>
                                        <td><?= $row['212359_tanggal_pemesanan']; ?></td>
                                        <td>
                                        <?= $row['212359_status_pemesanan']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($row['212359_status_pemesanan'] != 'Dikonfirmasi') : ?>
                                                <a href="/pesanan/konfirmasi/<?= $row['id_pemesanan']; ?>" class="btn btn-primary"><i class="fas fa-check"></i> Konfirmasi</a>
                                            <?php else : ?>
                                                <a href="#" class="btn btn-success disabled"><i class="fas fa-check"></i> Sudah Dikonfirmasi</a>
                                            <?php endif; ?>
                                            <a href="/pesanan/delete/<?= $row['id_pemesanan']; ?>" class="btn btn-danger" onclick="return confirm ('Apakah anda yakin?');"><i class="fas fa-trash"></i> Hapus</a>
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
