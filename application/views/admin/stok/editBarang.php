<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><?php echo $message;?>
<?php echo validation_errors();?>
<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label class="col-lg-3 control-label">Nama Barang</label>
        <div class="col-lg-5">
            <input type="hidden" name="id" value="<?php echo $barang['id_barang'];?>">
            <input type="text" name="nama_barang" value="<?php echo $barang['nama_barang'];?>" readonly="readonly" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">Harga</label>
        <div class="col-lg-5">
            <input type="harga" name="harga" value="<?php echo $barang['harga'];?>" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3 control-label">Stok</label>
        <div class="col-lg-5">
            <input type="stok" name="stok" value="<?php echo $barang['stok'];?>" class="form-control">
        </div>
    </div>
    
    <div class="form-group well">
        <div class="col-lg-5">
            <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            <a href="<?php echo site_url('CBarang/Barang');?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
</form>