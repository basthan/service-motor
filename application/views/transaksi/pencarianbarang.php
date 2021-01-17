<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><table class="table table-striped">
        <thead>
            <tr>
                <td>Kode Barang</td>
                <td>Nama Barang</td>
                <td>Harga</td>
                <td>Stok</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($barang as $tmp):?>
        <tr>
            <td><?php echo $tmp->id_barang;?></td>
            <td><?php echo $tmp->nama_barang;?></td>
            <td><?php echo $tmp->harga;?></td>
            <td><?php echo $tmp->stok;?></td>
            <td><a href="#" class="tambah" id_barang="<?php echo $tmp->id_barang;?>"
            nama_barang="<?php echo $tmp->nama_barang;?>"
            harga="<?php echo $tmp->harga;?>" stok="<?php echo $tmp->stok;?>"><i class="glyphicon glyphicon-plus"></i></a></td>
        </tr>
        <?php endforeach;?>
    </table>