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
                                <input type="text" class="form-control" name="no_nota" id="no_nota" aria-describedby="notaHelp" placeholder="No Nota" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal (required)</label>
                                <input type="text" class="form-control" name="tanggal" id="tanggal" aria-describedby="tglHelp" placeholder="Tanggal Transaksi" required="" value="<?= date('d-m-Y')?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kasir</label>
                                <input type="text" class="form-control" id="no_nota" aria-describedby="emailHelp" placeholder="Nama Kasir" required="">
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
                                <input type="text" class="form-control" name="no_nota" id="no_nota" aria-describedby="notaHelp" placeholder="Pelanggan" required="">
                            </div>


                        </form>

                    </div>
                </div>
            </div>
            <div class="card mb-9">
                <div class="card-body">
                    <h5 class="judul-transaksi">
                        <i class="fa fa-shopping-cart fa-fw"></i> Penjualan <i class="fa fa-angle-right fa-fw"></i> Transaksi
                        <a href="http://localhost/penjualan/penjualan/transaksi" class="pull-right"><i class="fa fa-refresh fa-fw"></i> Refresh Halaman</a>
                    </h5>
                    <table class="table table-bordered" id="TabelTransaksi">
                        <thead>
                        <tr>
                            <th style="width:35px;">#</th>
                            <th style="width:210px;">Kode Barang</th>
                            <th>Nama Barang</th>
                            <th style="width:120px;">Harga</th>
                            <th style="width:75px;">Qty</th>
                            <th style="width:125px;">Sub Total</th>
                            <th style="width:40px;"></th>
                        </tr>
                        </thead>
                        <tbody><tr><td>1</td><td><input type="text" class="form-control" name="kode_barang[]" id="pencarian_kode" placeholder="Ketik Kode / Nama Barang"><div id="hasil_pencarian"></div></td><td></td><td><input type="hidden" name="harga_satuan[]"><span></span></td><td><input type="text" class="form-control" id="jumlah_beli" name="jumlah_beli[]" onkeypress="return check_int(event)" disabled=""></td><td><input type="hidden" name="sub_total[]"><span></span></td><td><button class="btn btn-default" id="HapusBaris"><i class="fa fa-times" style="color:red;"></i></button></td></tr></tbody>
                    </table>

                    <div class="alert alert-info TotalBayar">
                        <button id="BarisBaru" class="btn btn-default pull-left"><i class="fa fa-plus fa-fw"></i> Baris Baru (F7)</button>
                        <h2>Total : <span id="TotalBayar">Rp. 0</span></h2>
                        <input type="hidden" id="TotalBayarHidden" value="0">
                    </div>

                    <div class="row">
                        <div class="col-sm-7">
                            <textarea name="catatan" id="catatan" class="form-control" rows="2" placeholder="Catatan Transaksi (Jika Ada)" style="resize: vertical; width:83%;"></textarea>

                            <br>
                            <p><i class="fa fa-keyboard-o fa-fw"></i> <b>Shortcut Keyboard : </b></p>
                            <div class="row">
                                <div class="col-sm-6">F7 = Tambah baris baru</div>
                                <div class="col-sm-6">F9 = Cetak Struk</div>
                                <div class="col-sm-6">F8 = Fokus ke field bayar</div>
                                <div class="col-sm-6">F10 = Simpan Transaksi</div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-6 control-label">Bayar (F8)</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="cash" id="UangCash" class="form-control" onkeypress="return check_int(event)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 control-label">Kembali</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="UangKembali" class="form-control" disabled="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6" style="padding-right: 0px;">
                                        <button type="button" class="btn btn-warning btn-block" id="CetakStruk">
                                            <i class="fa fa-print"></i> Cetak (F9)
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
                    </div>

                </div>
            </div>
        </div>	
    </div>			
</div>