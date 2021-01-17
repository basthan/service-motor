<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><?php echo $message;?>
<?php echo validation_errors();?>
<form class="form-horizontal" action="<?php echo site_url('CBarang/tambahbarang');?>" method="post">
    <div class="form-group">
        <label class="col-lg-3 control-label">Nama Barang</label>
        <div class="col-lg-5">
            <input type="text" name="nama_barang" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">Harga</label>
        <div class="col-lg-5">
            <input type="text" name="harga" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3 control-label">stok</label>
        <div class="col-lg-5">
            <input type="text" name="stok" class="form-control">
        </div>
    </div>
    
    <div class="form-group well">
        <div class="col-lg-5">
            <button class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            <a href="<?php echo site_url('CBarang/barang');?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
</form>