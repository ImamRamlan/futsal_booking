<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pilih Sesi | Memulai</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition lockscreen">
  <!-- Automatic element centering -->
  <div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
      <a href="/beranda"><b>Booking</b>Futsal</a>
    </div>
    <div class="lockscreen-item">
      <div class="lockscreen">
        <div class="help-block text-center">
          Pilih masuk untuk memulai sesi.
        </div><br>
        <div class="input-group">

          <div class="col-md">
            <a href="/loginpelanggan" class="btn btn-success">Pelanggan</a>
          </div>
          <div class="col-md">
            <a href="/loginadmin" class="btn btn-warning">Administrator</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2014-2021 <b><a href="https://adminlte.io" class="text-black">AdminLTE.io</a></b><br>
    All rights reserved
  </div>
  <!-- /.center -->

  <!-- jQuery -->
  <script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>