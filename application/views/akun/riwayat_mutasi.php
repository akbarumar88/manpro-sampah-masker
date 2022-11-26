<?php // echo md5('admin'); 
?>
<?php //dd($_SESSION); 
?>
<?php flash('welcome') ?>
<?php flash('access') ?>


<h3 class="mb-4">Riwayat Mutasi</h3>

<div class="table-responsive">
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