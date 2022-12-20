<?= flash('errlogin') ?>
<?= flash('succinput') ?>


<form method="get" action="<?= base_url('admin/input2') ?>">
    <div class="mb-3">
        <label class="form-label" for="exampleInputUUID">UUID</label>
        <input required type="text" class="form-control" id="exampleInputUUID" aria-describedby="emailHelp" name="uuid" value="<?= $this->input->get('uuid') ?>">
        <small id="emailHelp" class="form-text text-muted">Masukkan UUID</small>
    </div>
    
    <!-- <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->
    <button type="submit" class="btn btn-primary">Lanjut</button>
</form>