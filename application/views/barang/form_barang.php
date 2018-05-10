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
                                <label for="userName">Kode Barang<span class="text-danger">*</span> <?php echo form_error('kd_barang') ?></label> 
                                <input type="text" name="kd_barang" id="kd_barang" value="<?= $kd_barang; ?>" data-parsley-trigger="change" required="" placeholder="Kode Barang" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="userName">Nama Barang<span class="text-danger">*</span> <?php echo form_error('nama_barang') ?></label>
                                <input type="text" name="nama_barang" id="nama_barang" value="<?= $nama_barang; ?>" data-parsley-trigger="change" required="" placeholder="Nama Barang" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="userName">Satuan Barang<span class="text-danger">*</span> <?php echo form_error('satuan') ?></label>
                                <?= form_dropdown('satuan', ['Gram' => 'Gram', 'Kilogram' => 'Kilogram'],$satuan, 'class="form-control" id="satuan"'); ?>	
                            </div>
                            <div class="form-group">
                                <label for="userName">Kualitas Barang<span class="text-danger">*</span> <?php echo form_error('kd_kualitas') ?></label>
                                <?= form_dropdown('kd_kualitas', $kualitas,$kualitas_selected, 'class="form-control" id="kualitas"'); ?>	
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