<?php echo $message;?>
<?php echo validation_errors();?>
<form class="form-horizontal" action="<?php echo site_url('Cmekanik/tambahmekanik');?>" method="post">
    <div class="form-group">
        <label class="col-lg-3 control-label">Nama mekanik</label>
        <div class="col-lg-5">
            <input type="text" name="nama_mekanik" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">No Telepon</label>
        <div class="col-lg-5">
            <input type="text" name="no_telepon_mekanik" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3 control-label">Alamat</label>
        <div class="col-lg-5">
            <input type="text" name="alamat_mekanik" class="form-control">
        </div>
    </div>
    
    <div class="form-group well">
        <div class="col-lg-5">
            <button class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            <a href="<?php echo site_url('Cmekanik/mekanik');?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
</form>