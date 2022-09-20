<div class="page-header">
    <h1 style="color:black;">Titik Sebaran Lokasi Pengiriman</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="titik_kurir" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Kelompok</th>
                <th>Kode</th>
                <th>Nama Titik</th>
                <th>Lat</th>
                <th>Lng</th>
                <th>Penerima</th>
                <th>No. Telepon</th>
            </tr>
        </thead>
        <?php
        $q = esc_field(_get('q'));
        $rows = $db->get_results("SELECT * 
        FROM tb_titik t LEFT JOIN tb_kelompok k ON k.kode_kelompok=t.kode_kelompok 
        WHERE nama_kelompok LIKE '%$q%' 
        ORDER BY t.kode_kelompok DESC, kode_titik");
        $no = 0;
        foreach ($rows as $row) : ?>
            <tr>
                <td><?= $row->nama_kelompok ?></td>
                <td><?= $row->kode_titik ?></td>
                <td><?= $row->nama_titik ?></td>
                <td><?= $row->lat ?></td>
                <td><?= $row->lng ?></td>
                <td><?= $row->penerima ?></td>
                <td><center><span class="glyphicon glyphicon-phone"></span> <a href="https://wa.me/62<?= $row->notelp ?>" target="_blank"><?= $row->notelp ?></a></center></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>