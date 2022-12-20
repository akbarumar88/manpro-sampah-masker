<?= flash('errlogin') ?>
<?= flash('succregister') ?>


<?php

$email = !empty($admin['email']) ? $admin['email'] : $this->input->post('email');
$username = !empty($admin['username']) ? $admin['username'] : $this->input->post('username');
$nama_lengkap = !empty($admin['nama_lengkap']) ? $admin['nama_lengkap'] : $this->input->post('nama_lengkap');

?>

<form method="POST">
    <div class="mb-3">
        <label class="form-label" for="exampleInputEmail1">Username</label>
        <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" value="<?= $username ?>">
        <small id="emailHelp" class="form-text text-muted">Masukkan username anda.</small>
    </div>
    <div class="mb-3">
        <label class="form-label" for="exampleInputPassword1">Nama Lengkap</label>
        <input required type="text" class="form-control" id="exampleInputPassword1" name="nama_lengkap" value="<?= $nama_lengkap ?>">
        <small id="emailHelp" class="form-text text-muted">Masukkan nama lengkap</small>
    </div>
    <div class="mb-3">
        <label class="form-label" for="exampleInputPassword1">E-mail</label>
        <input required type="text" class="form-control" id="exampleInputPassword1" name="email" value="<?= $email ?>">
        <small id="emailHelp" class="form-text text-muted">Masukkan email.</small>
    </div>
    <!-- <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->
    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
</form>