<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    <table class="table table-striped">
        <thead>
            <tr>
                <td>Kode Barang</td>
                <td>Nama Barang</td>
                <td>Harga</td>
                <td>Jumlah</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($tmp as $key):?>
        <tr>
            <td><?php echo $key->id_barang;?></td>
            <td><?php echo $key->nama_barang;?></td>
            <td><?php echo $key->harga;?></td>
            <td><?php echo $key->jumlah_barang;?></td>
            <td><a href="#" class="hapus" id_barang="<?php echo $key->id_barang;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        <?php endforeach;?>
        <tr>
            <td colspan="2">Total Barang</td>
            <td colspan="2"><input type="text" id="jumlahTmp" readonly="readonly" value="<?php echo $jumlahTmp;?>" class="form-control"></td>
        </tr>
    </table>