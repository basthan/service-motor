<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><?php echo $message;?>
<?php echo validation_errors();?>
<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label class="col-lg-3 control-label">Nama Jasa</label>
        <div class="col-lg-5">
            <input type="hidden" name="id" value="<?php echo $jasa['id_jasa'];?>">
            <input type="text" name="nama_jasa" value="<?php echo $jasa['nama_jasa'];?>" readonly="readonly" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">Biaya</label>
        <div class="col-lg-5">
            <input type="text" name="biaya" value="<?php echo $jasa['biaya'];?>" class="form-control">
        </div>
    </div>
    
    <div class="form-group well">
        <div class="col-lg-5">
            <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            <a href="<?php echo site_url('CJasa/jasa');?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
</form>