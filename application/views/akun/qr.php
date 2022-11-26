<?php // echo md5('admin'); 
?>
<?php //dd($_SESSION); 
?>
<?php flash('welcome') ?>
<?php flash('access') ?>


<h3 class="mb-4">QR Code, <?= $this->session->nama_lengkap ?></h3>
<div style="">
    <img style="margin-left: -16px" src="<?= base_url("img/qr_code/{$user['uuid']}.png") ?>" alt="">
</div>