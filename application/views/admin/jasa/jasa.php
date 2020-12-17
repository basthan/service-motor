<legend>Tambah Jasa</legend>
<a href="<?php echo site_url('Cjasa/tambahjasa');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Nama Jasa</td>
            <td>Biaya</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no = (int)$this->uri->segment('3') + 1; foreach($jasa as $row){?>
    <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $row->nama_jasa;?></td>
        <td><?php echo $row->biaya;?></td>
        <td><a href="<?php echo site_url('Cjasa/edit/'.$row->id_jasa);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
    </tr>
    <?php }?>
</table>
<?php echo $this->pagination->create_links(); ?>
