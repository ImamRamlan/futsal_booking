<!-- views/admin/daftarpenawaran/pdf.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        /* Add your CSS styles for the PDF here */
    </style>
</head>

<body>
    <h1><?= $title; ?></h1>
    <div class="card-body">
        <hr class="opacity-75">
        <table style="margin-bottom: 10px;" id="nama">
            <tbody>
                <tr>
                    <td style="padding-bottom: 5px;">Nama Admin</td>
                    <td style="padding-bottom: 5px;">:</td>
                    <td style="padding-bottom: 5px;"><?= session('nama') ?></td>
                </tr>
                <tr>
                    <td style=" width: 15%; padding-bottom: 5px;">Laporan Pemesanan Lapangan</td>
                </tr>
            </tbody>
        </table>
        <!-- Default Table -->
        <table style="text-align: center; border-collapse: collapse; border: 1px solid #ddd;" id="table" width="100%">
            <thead>
                <tr>
                    <th style="text-align:center" scope="col">No</th>
                    <th style="text-align:center" scope="col">Nama Pelanggan</th>
                    <th style="text-align:center" scope="col">Nama Lapangan</th>
                    <th style="text-align:center" scope="col">Tanggal Pemesanan</th>
                    <th style="text-align:center" scope="col">Waktu Mulai</th>
                    <th style="text-align:center" scope="col">Waktu Selesai</th>
                    <th style="text-align:center" scope="col">Total Harga</th>
                    <th style="text-align:center" scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($pesanan as $row) : ?>
                    <tr scope="row" id="1">
                        <td><?= $i++; ?></td>
                        <td><?= esc($row['212359_nama_lengkap']) ?></td>
                        <td><?= esc($row['212359_nama_lapangan']) ?></td>
                        <td><?= esc($row['212359_tanggal_pemesanan']) ?></td>
                        <td><?= esc($row['212359_mulai']) ?></td>
                        <td><?= esc($row['212359_selesai']) ?></td>
                        <td><?= esc($row['212359_total_harga']) ?></td>
                        <td><?= esc($row['212359_status_pemesanan']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>