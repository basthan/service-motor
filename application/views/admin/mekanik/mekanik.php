<legend>Tambah mekanik</legend>
<a href="<?php echo site_url('Cmekanik/tambahmekanik');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Nama mekanik</td>
            <td>No Telepon</td>
            <td>Alamat</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no = (int)$this->uri->segment('3') + 1; foreach($mekanik as $row){?>
    <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $row->nama_mekanik;?></td>
        <td><?php echo $row->no_telepon_mekanik;?></td>
        <td><?php echo $row->alamat_mekanik;?></td>
        <td><a href="<?php echo site_url('Cmekanik/edit/'.$row->id_mekanik);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
    </tr>
    <?php }?>
</table>
<?php echo $this->pagination->create_links(); ?>
