<div class="content">            
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Detail Transaksi Pembelian</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Transaksi</li>
                        <li class="breadcrumb-item active">Pembelian</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
		<div class="row">
			<div class="col-xl-12">	
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-file-text-o fa-fw"></i> Detail Transaksi
                        <a href="<?= site_url('pembelian');?>" class="pull-right"><i class="fa fa-caret-left bigfonts"></i> Kembali</a></h3>
                    </div>
                    <div class="card-body">	
                        <div class="col-md-6">
                            <table class="table" width="500px">
                                <tr>
                                    <td style="width:25%">No Transaksi</td>
                                    <td>: <strong><?= $transaksi->no_transaksi;?></strong></td>
                                </tr>
                                <tr>
                                    <td>Tipe Transaksi</td>
                                    <td>: <?= $transaksi->kd_tipe_transaksi.' ('.$transaksi->nama_transaksi.')';?></td>                    
                                </tr>
                                <tr>
                                    <td>Tanggal Transaksi</td>
                                    <td>: <?= tgl_lengkap($transaksi->tanggal_transaksi);?></td>
                                </tr>
                                <tr>
                                    <td>Nama User</td>
                                    <td>: <?= $transaksi->nama_pengguna;?></td>                    
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>: <?= $transaksi->keterangan_lain;?></td>                    
                                </tr> 
                                                  
                            </table>     
                        </div>	
                        <div class="col-xs-10">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Berat</th>
                                    <th style="width:10%" class="text-center">Qty/Pt</th>
                                    <th>Harga/gram</th>
                                    <th>Harga Total</th>                                    
                                </tr>                                
                                <?php 
                                foreach($detail as $d){
                                    echo ' 
                                    <tr>
                                            <td>'.$d->kd_barang.'</td>
                                            <td>'.$d->nama_barang.'</td>
                                            <td>'.$d->berat_transaksi.' gram</td>
                                            <td style="text-align:center">'.$d->qty_transaksi.'</td>
                                            <td>'.rupiah($d->harga_satuan).'</td>
                                            <td>'.rupiah($d->harga_total).'</td>
                                    </tr>';
                                }
                                ?>
                                <tr>
                                    <th colspan="5" class="text-center">Total Transaksi</th>
                                    <th><?= rupiah($transaksi->grand_total);?></th>
                                </tr>              
                                </tbody>
                            </table>          
                        </div>													
                                           
					</div>
                </div>            
            </div>														
        </div>	
    </div>			
</div>