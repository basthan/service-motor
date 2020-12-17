
    <div class="col-sm-3">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-cart-arrow-down"></i> BARANG TERLARIS</div>
            
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Stok Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($barangLaris as $row){?>
                    <tr>
                        <td><?php echo $row->nama_barang;?></td>
                        <td><?php echo $row->jumlah;?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-cart-arrow-down"></i> MEKANIK TERLARIS</div>
            
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Nama Mekanik</th>
                        <th>Jumlah Service</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($mekanikLaris as $row){?>
                    <tr>
                        <td><?php echo $row->nama_mekanik;?></td>
                        <td><?php echo $row->jumlah_dipakai;?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-cart-arrow-down"></i> TRANSAKSI BERDASARKAN TANGGAL</div>
            
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jumlah Barang Terjual</th>
                        <th>Jumlah Service</th>
                        <th>Total Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($bTanggal as $row){?>
                    <tr>
                        <td><?php echo $row->tanggal;?></td>
                        <td><?php echo $row->jumlah_barang;?></td>
                        <td><?php echo $row->jumlah_jasa;?></td>
                        <td><?php echo $row->total_biaya;?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-cart-arrow-down"></i> TRANSAKSI HARIAN</div>
            
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Jumlah Barang Terjual</th>
                        <th>Jumlah Service</th>
                        <th>Total Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($bHari as $row){?>
                    <tr>
                        <td><?php echo $row->hari;?></td>
                        <td><?php echo $row->jumlah_barang;?></td>
                        <td><?php echo $row->jumlah_jasa;?></td>
                        <td><?php echo $row->total_biaya;?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-cart-arrow-down"></i> TRANSAKSI BULANAN</div>
            
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Jumlah Barang Terjual</th>
                        <th>Jumlah Service</th>
                        <th>Total Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($bBulan as $row){?>
                    <tr>
                        <td><?php echo $row->bulan;?></td>
                        <td><?php echo $row->jumlah_barang;?></td>
                        <td><?php echo $row->jumlah_jasa;?></td>
                        <td><?php echo $row->total_biaya;?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-cart-arrow-down"></i> TRANSAKSI TAHUNAN</div>
            
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Jumlah Barang Terjual</th>
                        <th>Jumlah Service</th>
                        <th>Total Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($bTahun as $row){?>
                    <tr>
                        <td><?php echo $row->tahunan;?></td>
                        <td><?php echo $row->jumlah_barang;?></td>
                        <td><?php echo $row->jumlah_jasa;?></td>
                        <td><?php echo $row->total_biaya;?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>