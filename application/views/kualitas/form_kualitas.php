<div class="content">            
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Form Master Kualitas</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Kualitas</li>
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
                                <label for="userName">Kode Kualitas<span class="text-danger">*</span> <?php echo form_error('kd_kualitas') ?></label> 
                                <input type="text" name="kd_kualitas" id="kd_kualitas" value="<?= $kd_kualitas; ?>" data-parsley-trigger="change" <?= !empty($kd_kualitas) ? "disabled" : ""?> placeholder="Kode Kualitas" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="userName">Persentase<span class="text-danger">*</span> <?php echo form_error('nama_supplier') ?></label>
                                <input type="text" name="persentase" id="persentase" value="<?= $persentase; ?>" data-parsley-trigger="change" required="" placeholder="Persentase Kualitas" class="form-control" >
                            </div> 
                            <div class="form-group">
                                <label for="userName">Harga Jual<span class="text-danger">*</span> <?php echo form_error('harga_jual') ?></label>
                                <input  data-parsley-type="number" type="number" name="harga_jual" id="harga_jual"  value="<?= $harga_jual; ?>"data-parsley-trigger="change" required="" placeholder="Harga Jual" class="form-control" >
                            </div>                                                                                   
                            <div class="form-group">
                                <label>Keterangan<span class="text-danger">*</span> <?php echo form_error('ketarangan') ?></label>
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