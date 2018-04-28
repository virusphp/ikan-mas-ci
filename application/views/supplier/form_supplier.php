<div class="content">            
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Form Master Barang</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Barang</li>
                        <li class="breadcrumb-item active">Form</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
		<div class="row">
			<div class="col-xl-12">						
                <div class="card mb-3">  
                <div class="col-xl-6">
                    <div class="card-body">																
                        <form action="<?php echo $action; ?>" method="post">
                            <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                            <div class="form-group">
                                <label for="userName">Kode Supplier<span class="text-danger">*</span> <?php echo form_error('kd_supplier') ?></label> 
                                <input type="text" name="kd_supplier" id="kd_supplier" value="<?= $kd_supplier; ?>" data-parsley-trigger="change" required="" placeholder="Kode Supplier" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="userName">Nama Supplier<span class="text-danger">*</span> <?php echo form_error('nama_supplier') ?></label>
                                <input type="text" name="nama_supplier" id="nama_supplier" value="<?= $nama_supplier; ?>" data-parsley-trigger="change" required="" placeholder="Nama Supplier" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Alamat<span class="text-danger">*</span> <?php echo form_error('alamat') ?></label>
                                <div>
                                    <textarea name="alamat" required="" placeholder="Alamat" class="form-control"><?= $alamat;?></textarea>
                                </div>
                            </div>   
                            <div class="form-group">
                                <label for="userName">No Telpn<span class="text-danger">*</span> <?php echo form_error('no_telp') ?></label>
                                <input  data-parsley-type="number" type="text" name="no_telp" id="no_telp"  value="<?= $no_telp; ?>"data-parsley-trigger="change" required="" placeholder="No Telpn" class="form-control" >
                            </div>                                                                          
                            <div class="form-group">
                                <label>Keterangan<span class="text-danger">*</span> <?php echo form_error('keterangan') ?></label>
                                <div>
                                    <textarea name="keterangan" required="" placeholder="Keterangan" class="form-control"><?= $keterangan;?></textarea>
                                </div>
                            </div>                           

                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary" type="submit"><?= $button;?></button>
                                <a href="javascript:history.back()" class="btn btn-secondary m-l-5">Cancel</a>
                                
                            </div>

                        </form>
                        
					</div>
                </div>                                  
                   
                </div>                        
            </div>														
        </div>	
    </div>			
</div>