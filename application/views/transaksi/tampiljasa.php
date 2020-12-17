    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID Jasa</td>
                <td>Nama Jasa</td>
                <td>Biaya</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($tmp as $key):?>
        <tr>
            <td><?php echo $key->id_jasa;?></td>
            <td><?php echo $key->nama_jasa;?></td>
            <td><?php echo $key->biaya;?></td>
            <td><a href="#" class="hapusjasa" id_jasa="<?php echo $key->id_jasa;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        <?php endforeach;?>
        <tr>
            <td colspan="2">Total Jasa</td>
            <td colspan="2"><input type="text" id="jumlahJasa" readonly="readonly" value="<?php echo $jumlahJasa;?>" class="form-control"></td>
        </tr>
    </table>