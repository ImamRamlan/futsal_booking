<?= $this->extend('templatess/index'); ?>

<?= $this->section('page'); ?>
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible col-md-5">
        <h5><i class="icon fas fa-check"></i><?= session()->getFlashdata('success'); ?></h5>
    </div>
<?php endif; ?>
<?php if (isset($success)): ?>
    <div class="alert alert-success">
        <?= $success ?>
    </div>
<?php endif; ?>
<?= $this->endSection(); ?>