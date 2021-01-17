<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><hr>
<?php echo $message;?>
<label>Riwayat Transaksi</label>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Nama</td>
            <td>STNK</td>
            <td>Waktu Transaksi</td>
            <td>Jumlah Barang Terjual</td>
            <td>Jumlah Jasa Terpakai</td>
            <td>Total Pembayaran</td>
            <td colspan="1"></td>
        </tr>
    </thead>
    <?php $no=0; foreach($historyAll as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->nama;?></td>
        <td><?php echo $row->stnk;?></td>
        <td><?php echo $row->date;?></td>
        <td><?php echo $row->jumlah_barang;?></td>
        <td><?php echo $row->jumlah_jasa;?></td>
        <td><?php echo $row->total_biaya;?></td>
        <td><a href="<?php echo site_url('transaksi/detail/'.$row->id_transaksi);?>">Detail</a></td>
    </tr>
    <?php endforeach;?>
</Table>
<?php echo $this->pagination->create_links(); ?>
