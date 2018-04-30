<div class="content">            
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Form Master User</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">User</li>
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
                                <label for="username">Username<span class="text-danger">*</span> <?php echo form_error('username') ?></label> 
                                <input type="text" name="username" id="username" value="<?= $username; ?>" data-parsley-trigger="change" required="" placeholder="username" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="nama_pengguna">Nama Pengguna<span class="text-danger">*</span> <?php echo form_error('nama_pengguna') ?></label>
                                <input type="text" name="nama_pengguna" id="nama_pengguna" value="<?= $nama_pengguna; ?>" data-parsley-trigger="change" required="" placeholder="Nama Pengguna" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="password">Password<span class="text-danger">*</span> <?php echo form_error('password') ?></label>
                                <input type="password" name="password" id="password" value="<?= $password; ?>" data-parsley-trigger="change" placeholder="Nama Pengguna" class="form-control" >
                            </div>   
                            <div class="form-group">
                                <label for="status">Status<span class="text-danger">*</span> <?php echo form_error('status') ?></label>
                                <input  data-parsley-type="text" type="text" name="status" id="status"  value="<?= $status; ?>"data-parsley-trigger="change" required="" placeholder="Status" class="form-control" >
                            </div>                                                                          
                            <div class="form-group">
                                <label for="gld">Golongan<span class="text-danger">*</span> <?php echo form_error('gld') ?></label>
                                <input  data-parsley-type="text" type="text" name="gld" id="gld"  value="<?= $status; ?>"data-parsley-trigger="change" required="" placeholder="Golongan" class="form-control" >
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