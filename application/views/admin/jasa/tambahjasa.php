<?php echo $message;?>
<?php echo validation_errors();?>
<form class="form-horizontal" action="<?php echo site_url('Cjasa/tambahjasa');?>" method="post">
    <div class="form-group">
        <label class="col-lg-3 control-label">Nama Jasa</label>
        <div class="col-lg-5">
            <input type="text" name="nama_jasa" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">Biaya</label>
        <div class="col-lg-5">
            <input type="text" name="biaya" class="form-control">
        </div>
    </div>
    
    <div class="form-group well">
        <div class="col-lg-5">
            <button class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            <a href="<?php echo site_url('Cjasa/jasa');?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
</form>