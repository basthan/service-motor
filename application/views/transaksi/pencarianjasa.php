<table class="table table-striped">
        <thead>
            <tr>
                <td>ID Jasa</td>
                <td>Nama Jasa</td>
                <td>Biaya</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($jasa as $tmp):?>
        <tr>
            <td><?php echo $tmp->id_jasa;?></td>
            <td><?php echo $tmp->nama_jasa;?></td>
            <td><?php echo $tmp->biaya;?></td>
            <td><a href="#" class="tambahjasa" id_jasa="<?php echo $tmp->id_jasa;?>"
            nama_jasa="<?php echo $tmp->nama_jasa;?>"
            biaya="<?php echo $tmp->biaya;?>"><i class="glyphicon glyphicon-plus"></i></a></td>
        </tr>
        <?php endforeach;?>
    </table>