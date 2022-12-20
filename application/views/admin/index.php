<?php // echo md5('admin'); 
?>
<?php //dd($_SESSION); 
?>
<?php flash('welcome') ?>
<?php flash('access') ?>


<h3 class="mb-2">Selamat Datang, <?= $this->session->nama_lengkap_admin ?></h3>
<!-- <h1 class="mb-4 fw-semibold">Rp<?= number_format(0) ?></h1> -->
<!-- <a class="btn btn-info" href="<?= base_url("akun/riwayat_mutasi?tglawal=" . date('Y-m-d') . "&tglakhir=" . date('Y-m-d')) ?>">Riwayat Mutasi</a> -->