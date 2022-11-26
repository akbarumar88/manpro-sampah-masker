<?php // echo md5('admin'); 
?>
<?php //dd($_SESSION); 
?>
<?php flash('welcome') ?>
<?php flash('access') ?>


<h3 class="mb-4">Selamat Datang, <?= $this->session->nama_lengkap ?></h3>