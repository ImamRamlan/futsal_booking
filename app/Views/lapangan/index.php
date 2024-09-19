<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Lapangan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Data Lapangan</a></li>
                    <li class="breadcrumb-item active">List Lapangan</li>
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
                        <a href="/lapangan/create" class="btn btn-success mt-3"><i class="fas fa-plus-square"></i> Tambah Lapangan</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lapangan</th>
                                    <th>Gambar</th>
                                    <th>Harga Per Jam</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($lapangan as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['212359_nama_lapangan']; ?></td>
                                        <td>
                                            <img src="<?= base_url('uploads/lapangan/' . $row['212359_gambar']); ?>" alt="Lapangan Image" width="130" height="110">
                                        </td>
                                        <td><?= $row['212359_harga_per_jam']; ?></td>
                                        <td><?= $row['212359_deskripsi']; ?></td>
                                        <td class="text-center">
                                            <a href="/lapangan/edit/<?= $row['id_lapangan']; ?>" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="/lapangan/delete/<?= $row['id_lapangan']; ?>" class="btn btn-danger" onclick="return confirm ('Apakah anda yakin?');"><i class="fas fa-trash"></i> Hapus</a>
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
