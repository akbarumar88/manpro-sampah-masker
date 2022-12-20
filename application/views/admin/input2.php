<?= flash('errlogin') ?>
<?= flash('succregister') ?>


<?php if (empty($user)) : ?>
    <p>Pengguna tidak ditemukan, harap periksa UUID yang anda inputkan.</p>
    <a href="<?= base_url('admin/input') ?>" class="btn btn-info">Kembali</a>
<?php else : ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label" for="exampleInputNominal">Username</label>
            <input required type="text" class="form-control" id="exampleInputNominal" aria-describedby="emailHelp" name="jumlah" value="<?= $user['username'] ?>" disabled readonly>
            <small id="emailHelp" class="form-text text-muted">*Username</small>
        </div>

        <div class="mb-3">
            <label class="form-label" for="exampleInputNominal">Nama Lengkap</label>
            <input required type="text" class="form-control" id="exampleInputNominal" aria-describedby="emailHelp" name="jumlah" value="<?= $user['nama_lengkap'] ?>" disabled readonly>
            <small id="emailHelp" class="form-text text-muted">*Nama Lengkap</small>
        </div>

        <div class="mb-3">
            <label class="form-label" for="exampleInputNominal">Jumlah (kg)</label>
            <input required type="number" class="form-control" id="exampleInputNominal" aria-describedby="emailHelp" step=".1" name="jumlah" value="<?= $this->input->get('jumlah') ?>">
            <small id="emailHelp" class="form-text text-muted">Masukkan Jumlah</small>
        </div>

        <!-- <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php endif ?>