<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><?php echo $message;?>
<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label class="col-lg-3 control-label">Nama Pelanggan</label>
        <div class="col-lg-5">
            <input type="hidden" name="id" value="<?php foreach($biodata as $row){ echo $row->id_transaksi;}?>">
            <input type="text" name="nama" value="<?php foreach($biodata as $row){ echo $row->nama;}?>" readonly="readonly" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">No STNK</label>
        <div class="col-lg-5">
            <input type="text" name="stnk" value="<?php foreach($biodata as $row){ echo $row->stnk;}?>" readonly="readonly" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3 control-label">Merek Motor</label>
        <div class="col-lg-5">
            <input type="text" name="merek" value="<?php foreach($biodata as $row){ echo $row->merek;}?>" readonly="readonly" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">No Plat</label>
        <div class="col-lg-5">
            <input type="text" name="no_plat" value="<?php foreach($biodata as $row){ echo $row->no_plat;}?>" readonly="readonly" class="form-control">
        </div>
    </div>
<hr>
<div class="form-group">
    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-cart-arrow-down"></i> Detail Barang</div>
            
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($dBarang as $row){?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $row->nama_barang;?></td>
                        <td><?php echo $row->jumlah;?></td>
                        <td><?php echo $row->harga;?></td>
                        <td><?php echo $row->jbarang;?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
 </div> 
 <div class="form-group">
    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-cart-arrow-down"></i> Detail Jasa</div>
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Mekanik</th>
                        <th>Nama Jasa</th>
                        <th>Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($dJasa as $row){?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $row->nama_mekanik;?></td>
                        <td><?php echo $row->nama_jasa;?></td>
                        <td><?php echo $row->biaya;?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
 </div> 
 <hr> 
 <div class="form-group">
        <label class="col-lg-2 control-label">Total Biaya</label>
        <div class="col-lg-3">
            <input type="text" name="nama" value="<?php foreach($biodata as $row){ echo $row->total_biaya;}?>" readonly="readonly" class="form-control">
        </div>
 </div> 
 <hr>
    <div class="form-group well">
        <div class="col-lg-5">
            <button id="print" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Cetak Nota</button>
            <a href="<?php echo site_url('transaksi/riwayat');?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
</form>