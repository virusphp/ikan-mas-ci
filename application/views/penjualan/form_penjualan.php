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
                                <label>No Nota <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="no_nota" id="no_nota" readonly required="" value="<?= $no_nota;?>">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Transaksi <span class="text-danger">*</span></label>                               
                                <input type="text" class="form-control" name="tanggal" id="datepicker" placeholder="Tanggal Transaksi" required="" value="<?= date('d-m-Y') ?>">        
                            </div>
                            <div class="form-group">
                                <label>Nama User</label>
                                <select name="kasir" id="kasir" class="form-control" required >
                                    <option value="<?= $this->session->userdata('uid'); ?>"><?= $this->session->userdata('nama_pengguna'); ?></option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>   
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-file-text-o fa-fw"></i> Keterangan</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Keterangan Jual <span class="text-warning">(optional)</span></label>
                                <textarea name="keterangan" id="keterangan" rows="2" class="form-control"></textarea>
                            </div>                           
                    </div>
                </div>                             
            </div>
            <div class="col-sm-9">
                <div class="card mb-9">
                    <div class="card-header">
                        <h5 class="judul-transaksi">
                            <i class="fa fa-shopping-cart fa-fw"></i> Penjualan <i class="fa fa-angle-right fa-fw"></i>
                            Transaksi
                            <a href="<?= site_url('penjualan');?>" class="pull-right"><i class="fa fa-caret-left bigfonts"></i> Kembali</a>
                        </h5>
                    </div>
                    <div class="card-body">
                       
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                <div class="col-sm-5">
                                   <input type="text" name="pelanggan" id="pelanggan" class="form-control" placeholder="Nama Pelanggan">
                                   <?php echo form_error('pelanggan'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-5">
                                    <select name="kd_barang" id="kd_barang" class="form-control select2" onchange="lihat_harga()">
                                    <option value="">- Pilih Kode Barang -</option>
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
                                        <div class="col-sm-5" style="padding-right: 0px;">
                                            <button type="button" class="btn btn-warning btn-block" id="addbarang" onclick="add_barang()">
                                                <i class="fa fa-cart-plus bigfonts"></i> Tambah 
                                            </button>
                                        </div>
                                        <div class="col-sm-5">
                                            <button type="button" class="btn btn-primary btn-block" id="simpanTransaksi">
                                                <i class="fa fa-floppy-o"></i> Simpan 
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
                        <div class="col-sm-12">                                                                             
                            <h2 class="pull-right">Total : <span id="TotalHarga">Rp. 0</span></h2>   
                            <input type="hidden" id='TotalJual'>                             
                        </div>                    
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
                    $('#qty').val('');
                    $('#berat').val('');
                    // $('#harga').val('');
                    load_data_temp();                    
                }
            });
        }    
    }

    function HitungTotal()
    {
        $.ajax({
            type:"GET",
            url:"<?php echo base_url('penjualan/hitung_total');?>",            
            success:function(total){
                $("#TotalHarga").html(to_rupiah(total));
                $('#TotalJual').val(total);
            }
        });    
    }

    function to_rupiah(angka){
        var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
        var rev2    = '';
        for(var i = 0; i < rev.length; i++){
            rev2  += rev[i];
            if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                rev2 += '.';
            }
        }
        return 'Rp. ' + rev2.split('').reverse().join('');
    }

    function load_data_temp()
    {
        $.ajax({
            type:"GET",
            url:"<?php echo base_url('penjualan/load_temp_barang');?>",            
            success:function(html){
                $("#view").html(html);
                HitungTotal();
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

    function delete_temp(id)
    {        
        $.ajax({
            type:"GET",
            url:"<?php echo base_url('penjualan/hapus_temp');?>",
            data:"id="+id,
            success:function(html){
                $("#data"+id).hide(100);
                HitungTotal();
            }
        });
    }

    $(document).on('click', 'button#simpanTransaksi', function(){
        SimpanTransaksi();
    });

    function SimpanTransaksi()
    {
        var FormData = "no_nota="+encodeURI($('#no_nota').val());
        FormData += "&tanggal="+encodeURI($('#datepicker').val());
        FormData += "&pelanggan="+$('#pelanggan').val();      
        FormData += "&grand_total="+$('#TotalJual').val();
        FormData += "&keterangan="+$('#keterangan').val();
        $.ajax({
            url: "<?php echo site_url('penjualan/transaksi'); ?>",
            type: "POST",
            data: FormData,
            dataType:'json',
            success: function(data){
                if(data.status == false){
                    alert(data.pesan);
				    window.location.href="<?php echo site_url('penjualan/create'); ?>";
                }else{
                    window.location.href="<?php echo site_url('penjualan'); ?>";                   
                }                
            }
        });
    }
</script>