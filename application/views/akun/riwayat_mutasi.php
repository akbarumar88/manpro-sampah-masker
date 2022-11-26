<?php // echo md5('admin'); 
?>
<?php //dd($_SESSION); 
?>
<?php flash('welcome') ?>
<?php flash('access') ?>


<h3 class="mb-4">Riwayat Mutasi</h3>

<!-- Filter View -->
<form class="row gy-2 gx-3 align-items-center" id="filter">
    <div class="col-auto">
        <label class="visually-hidden" for="autoSizingInput">Cari Keterangan</label>
        <input name="cari" type="text" class="form-control" id="autoSizingInput" value="<?= $this->input->get("cari") ?>" placeholder="Cari Keterangan">
    </div>
    <div class="col-auto">
        <label class="visually-hidden" for="tglawal">Tanggal Awal</label>
        <input type="date" name="tglawal" id="tglawal" value="<?= $this->input->get("tglawal") ?>" class="form-control">
    </div>
    <div class="col-auto">
        <label class="visually-hidden" for="tglakhir">Tanggal Akhir</label>
        <input type="date" name="tglakhir" id="tglakhir" value="<?= $this->input->get("tglakhir") ?>" class="form-control">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>

<div class="table-responsive mt-4">
    <table class="table">
        <thead class="table-light">
            <tr>
                <th>No.</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Kredit</th>
                <th>Debit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mutasi as $i => $mut) : ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $mut['keterangan'] ?></td>
                    <td><?= $mut['tgl'] ?></td>
                    <td><?= number_format($mut['kredit']) ?></td>
                    <td><?= number_format($mut['debit']) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#filter').submit(function(e) {
            let tglawal = $('#tglawal').val()
            let tglakhir = $('#tglakhir').val()
            console.log({
                tglawal,
                tglakhir
            })

            if (tglawal > tglakhir) {
                alert("Tanggal awal tidak boleh melebihi tanggal akhir")
                e.preventDefault()
            }

            var a = moment(tglawal);
            var b = moment(tglakhir);
            let diff = Math.abs(a.diff(b, 'days')) // 1

            console.log({
                diff
            })
            if (diff > 30) {
                alert("Jangkauan filter tanggal maksimal 30 hari")
                e.preventDefault()
            }
            // e.preventDefault()
        })
    })
</script>