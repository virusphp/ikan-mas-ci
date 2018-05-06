<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Form Penjualan</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Transaksi</li>
                        <li class="breadcrumb-item active">Penjualan</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-sm-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-file-text-o fa-fw"></i> Informasi Nota</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Nota (required)</label>
                                <input type="text" class="form-control" name="no_nota" id="no_nota"
                                       aria-describedby="notaHelp" placeholder="No Nota" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal (required)</label>
                                <input type="text" class="form-control" name="tanggal" id="tanggal"
                                       aria-describedby="tglHelp" placeholder="Tanggal Transaksi" required=""
                                       value="<?= date('d-m-Y') ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kasir</label>
                                <input type="text" class="form-control" id="no_nota" aria-describedby="emailHelp"
                                       placeholder="Nama Kasir" required="">
                            </div>

                        </form>

                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-file-text-o fa-fw"></i> Informasi Pelanggan</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pelanggan</label>
                                <input type="text" class="form-control" name="no_nota" id="no_nota"
                                       aria-describedby="notaHelp" placeholder="Pelanggan" required="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="card mb-9">
                    <div class="card-header">
                        <h5 class="judul-transaksi">
                            <i class="fa fa-shopping-cart fa-fw"></i> Penjualan <i class="fa fa-angle-right fa-fw"></i>
                            Transaksi
                            <a href="" class="pull-right"><i
                                        class="fa fa-refresh fa-fw"></i> Refresh Halaman</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form autocomplete="off" action="#">
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-5">
                                    <select name="kd_barang" id="kd_barang" class="form-control select2" onchange="lihat_harga()">
                                    <option value="">- Pilih Kode arang -</option>
                                    <?php 
                                        foreach($barang as $q){
                                            echo '<option value='.$q->kd_barang.'>'.$q->kd_barang.' - '.$q->nama_barang.'</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label">Harga Per-gram</label>
                                <div class="col-sm-5">
                                   <input type="text" name="harga" id="harga" readonly class="form-control" placeholder="Harga per gram">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label">Berat Barang</label>
                                <div class="col-sm-5">
                                   <input type="number" name="berat" id="berat" class="form-control" placeholder="Berat Barang (gram)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label">Qty Barang</label>
                                <div class="col-sm-5">
                                   <input type="number" name="qty" id="qty" class="form-control" placeholder="Jumlah / Pt">
                                </div>
                            </div>
                            <br>  
                            <div class="col-sm-5">
                                <div class="form-horizontal">
                                    <div class="row">
                                        <div class="col-sm-6" style="padding-right: 0px;">
                                            <button type="button" class="btn btn-warning btn-block" id="addbarang" onclick="add_barang()">
                                                <i class="fa fa-cart-plus bigfonts"></i> Tambah (F9)
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-primary btn-block" id="Simpann">
                                                <i class="fa fa-floppy-o"></i> Simpan (F10)
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">											
                        <table class="table table-responsive-xl">                            
                            <tr>                               
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Berat</th>
                                <th scope="col">Qty/Pt</th>
                                <th scope="col">Harga/Gram</th>
                                <th scope="col">Harga Total</th>
                                <th>Aksi</th>
                            </tr>
                            <tbody id="view">
                            </tbody> 
                        </table>  
                                             
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/plugins/datatables/jQuery-2.1.4.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){        
        load_data_temp();
    });

    function add_barang()
    {
        var kdbarang=$("#kd_barang").val();
        var qty=$("#qty").val();
        var berat=$("#berat").val();
        var harga=$("#harga").val();         
        if (kdbarang==''){
            alert('Pilih Kode Barang');
            die;
        }else if(berat==''){
            alert('Masukan Berat Barang (gram)');
            die;
        }else if(qty==''){
            alert('Masukan QTY Barang');
            die;
        }else{
            $.ajax({
                type:"GET",
                url:"<?php echo base_url('penjualan/addbarang_ajax');?>",
                data:"kdbarang="+kdbarang+"&qty="+qty+"&berat="+berat+"&harga="+harga,
                success:function(html){
                    load_data_temp();
                }
            });
        }    
    }

    function load_data_temp()
    {
        $.ajax({
            type:"GET",
            url:"<?php echo base_url('penjualan/load_temp_barang');?>",            
            success:function(html){
                $("#view").html(html);
            }
        });    
    }

    function lihat_harga()
    {
        var kdbarang=$("#kd_barang").val();
        $.ajax({
            type:"GET",
            url:"<?php echo base_url('penjualan/harga_jual');?>",
            data:"kdbarang="+kdbarang,
            success: function (data) {                               
                $("#harga").val(data);                 
            }
        });    
    }

    function del_temp(id)
    {
        $.ajax({
            type:"GET",
            url:"<?php echo base_url('penjualan/hapus_temp');?>",
            data:"id="+id,
            success:function(html){
                $("#data"+id).hide(1000);
            }
        });
    }
</script>