<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><legend>Tambah Barang</legend>
<a href="<?php echo site_url('CBarang/tambahbarang');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Nama Barang</td>
            <td>Harga</td>
            <td>Stok</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no = (int)$this->uri->segment('3') + 1; foreach($barang as $row){?>
    <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $row->nama_barang;?></td>
        <td><?php echo $row->harga;?></td>
        <td><?php echo $row->stok;?></td>
        <td><a href="<?php echo site_url('CBarang/edit/'.$row->id_barang);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
    </tr>
    <?php }?>
</table>
<?php echo $this->pagination->create_links(); ?>
