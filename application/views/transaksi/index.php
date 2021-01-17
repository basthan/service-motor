<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><script>
    $(function(){
        
        function loadData(args) {
            //code
            $("#tampil").load("<?php echo site_url('transaksi/tampil/1');?>");
            $("#tampil2").load("<?php echo site_url('transaksi/tampil/2');?>");
            $("#totalBayar").load("<?php echo site_url('transaksi/tampil/3');?>");
        }
        loadData();
        
        function kosong(args) {
            //code
            $("#id_barang").val('');
            $("#nama_barang").val('');
            $("#harga").val('');
            $("#jumlahB").val('');
            $("#id_jasa").val('');
            $("#nama_jasa").val('');
            $("#biaya").val('');
        }

        $("#mekanik").click(function(){
            var mekanik=$("#mekanik").val();
            
            $.ajax({
                url:"<?php echo site_url('peminjaman/cariAnggota');?>",
                type:"POST",
                data:"mekanik="+mekanik,
                cache:false,
                success:function(html){
                    $("#nama").val(html);
                }
            })
        })
        
        
        $("#tambah").click(function(){
            var id_barang=$("#id_barang").val();
            var nama_barang=$("#nama_barang").val();
            var harga=$("#harga").val();
            var jumlahB=$("#jumlahB").val();
            
            if (id_barang=="") {
                //code
                alert("id_barang Masih Kosong");
                return false;
            }else{
                $.ajax({
                    url:"<?php echo site_url('transaksi/tambah');?>",
                    type:"POST",
                    data:"id_barang="+id_barang+"&nama_barang="+nama_barang+"&harga="+harga+"&jumlah_barang="+jumlahB,
                    cache:false,
                    success:function(html){
                        loadData();
                        kosong();
                    }
                })    
            }
            
        })

        $("#tambahjasa").click(function(){
            var id_jasa=$("#id_jasa").val();
            var nama_jasa=$("#nama_jasa").val();
            var biaya=$("#biaya").val();
            
            if (id_jasa=="") {
                //code
                alert("id_jasa Masih Kosong");
                return false;
            }else{
                $.ajax({
                    url:"<?php echo site_url('transaksi/tambahjasa');?>",
                    type:"POST",
                    data:"id_jasa="+id_jasa+"&nama_jasa="+nama_jasa+"&biaya="+biaya,
                    cache:false,
                    success:function(html){
                        loadData();
                        kosong();
                    }
                })    
            }
            
        })
        
        
        $("#simpan").click(function(){
            var stnk=$("#stnk").val();
            var no_plat=$("#no_plat").val();
            var nama=$("#nama").val();
            var merek=$("#merek").val();
            var tahun=$("#tahun").val();
            var jumlah=parseInt($("#jumlahTmp").val(),10);
            var jumlahJ=parseInt($("#jumlahJasa").val(),10);
            var bayar=$("#totalBayar").val();
            var mekanik=$("#mekanik").val();
            
            if (jumlah==0 && jumlahJ==0) {
                alert("pilih barang/jasa yang akan dibeli");
                return false;
            }else{
                $.ajax({
                    url:"<?php echo site_url('transaksi/sukses');?>",
                    type:"POST",
                    data:"stnk="+stnk+"&no_plat="+no_plat+"&nama="+nama+"&merek="+merek+"&tahun="+tahun+"&mekanik="+mekanik+"&total_biaya="+bayar,
                    cache:false,
                    success:function(html){
                        alert("Transaksi Pembelian berhasil");
                        location.reload();
                    }
                })
            }
            
        })
        
        $(".hapus").live("click",function(){
            var id_barang=$(this).attr("id_barang");
            
            $.ajax({
                url:"<?php echo site_url('transaksi/hapus');?>",
                type:"POST",
                data:"id_barang="+id_barang,
                cache:false,
                success:function(html){
                    loadData();
                }
            });
        });

        $(".hapusjasa").live("click",function(){
            var id_jasa=$(this).attr("id_jasa");
            
            $.ajax({
                url:"<?php echo site_url('transaksi/hapusjasa');?>",
                type:"POST",
                data:"id_jasa="+id_jasa,
                cache:false,
                success:function(html){
                    loadData();
                }
            });
        });
        
        $("#cari").click(function(){
            $("#myModal1").modal("show");
        })
        
        $("#caribarang").keyup(function(){
            var caribarang=$("#caribarang").val();
            
            $.ajax({
                url:"<?php echo site_url('transaksi/pencarianbarang');?>",
                type:"POST",
                data:"caribarang="+caribarang,
                cache:false,
                success:function(html){
                    $("#tampilbarang").html(html);
                }
            })
        })

       

        $("#cari2").click(function(){
            $("#myModal2").modal("show");
        })

        $("#carijasa").keyup(function(){
            var carijasa=$("#carijasa").val();
            
            $.ajax({
                url:"<?php echo site_url('transaksi/pencarianjasa');?>",
                type:"POST",
                data:"carijasa="+carijasa,
                cache:false,
                success:function(html){
                    $("#tampiljasa").html(html);
                }
            })
        })
        
        

        $(".tambah").live("click",function(){
            var id_barang=$(this).attr("id_barang");
            var nama_barang=$(this).attr("nama_barang");
            var harga=$(this).attr("harga");
            var stok=$(this).attr("stok");
            
            $("#id_barang").val(id_barang);
            $("#nama_barang").val(nama_barang);
            $("#harga").val(harga);
            $("#jumlahB").val(1);

            
            $("#myModal1").modal("hide");
        })

        $(".tambahjasa").live("click",function(){
            var id_jasa=$(this).attr("id_jasa");
            var nama_jasa=$(this).attr("nama_jasa");
            var biaya=$(this).attr("biaya");
            
            $("#id_jasa").val(id_jasa);
            $("#nama_jasa").val(nama_jasa);
            $("#biaya").val(biaya);
            
            $("#myModal2").modal("hide");
        })
        
    })
</script>

<legend><?php echo $title;?></legend>


<div class="panel panel-success">
    <div class="panel-heading">
        Detail Pelanggan
    </div>
    
    <div class="panel-body">
        <div class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="STNK" id="stnk">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="No Plat" id="no_plat">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama" id="nama">
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Merk" id="merek">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Tahun" id="tahun">
            </div>
        </div>
    </div>

    <div class="panel-heading">
        Parts
    </div>
    
    <div class="panel-body">
        <div class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="ID Barang" id="id_barang" readonly="readonly">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama Barang" id="nama_barang" readonly="readonly">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Harga" id="harga" readonly="readonly">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Jumlah" id="jumlahB" min="1">
            </div>
            <div class="form-group">
                <button id="tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
            <div class="form-group">
                <button id="cari" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
    </div>

    <div id="tampil"></div>

    <div class="panel-heading">
        Jasa
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-lg-1 control-label">Mekanik</label>
                <div class="col-lg-7">
                    <select name="mekanik" class="form-control" id="mekanik">
                        <option></option>
                        <?php foreach($mekanik as $key):?>
                            <option value="<?php echo $key->id_mekanik;?>"><?php echo $key->nama_mekanik;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
        </div>
    </div>


    <div class="panel-body">
        <div class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="ID Jasa" id="id_jasa" readonly="readonly">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama Jasa" id="nama_jasa" readonly="readonly">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Biaya" id="biaya" readonly="readonly">
            </div>
            <div class="form-group">
                <button id="tambahjasa" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
            <div class="form-group">
                <button id="cari2" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
    </div>
    
    <div id="tampil2"></div>
    <div class="panel-heading">
        Total Biaya
        <label id="totalBayar"></label>
    </div>
    <div class="panel-footer">
        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
    </div>
</div>






 <!-- Modal -->
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Cari Barang</h4>
                  </div>
                  <div class="modal-body">
                        <div class="form-horizontal">
                            <label class="col-lg-3 control-label">Nama Barang</label>
                            <div class="col-lg-5">
                                <input type="text" name="caribarang" id="caribarang" class="form-control">
                            </div>
                        </div>
                        
                        <div id="tampilbarang"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Cari Jasa</h4>
                  </div>
                  <div class="modal-body">
                        <div class="form-horizontal">
                            <label class="col-lg-3 control-label">Nama Jasa</label>
                            <div class="col-lg-5">
                                <input type="text" name="carijasa" id="carijasa" class="form-control">
                            </div>
                        </div>
                        
                        <div id="tampiljasa"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
