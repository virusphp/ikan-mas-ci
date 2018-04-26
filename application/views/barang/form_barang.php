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
                    <div class="card-body">																
                        <form action="#" data-parsley-validate="" novalidate="">
                            <div class="form-group">
                                <label for="userName">User Name<span class="text-danger">*</span></label>
                                <input type="text" name="nick" data-parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                            </div>
                            <div class="form-group">
                                <label for="emailAddress">Email address<span class="text-danger">*</span></label>
                                <input type="email" name="email" data-parsley-trigger="change" required="" placeholder="Enter email" class="form-control" id="emailAddress">
                            </div>
                            <div class="form-group">
                                <label for="pass1">Password<span class="text-danger">*</span></label>
                                <input id="pass1" type="password" placeholder="Password" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="passWord2">Confirm Password <span class="text-danger">*</span></label>
                                <input data-parsley-equalto="#pass1" type="password" required="" placeholder="Password" class="form-control" id="passWord2">
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <div>
                                    <input data-parsley-type="url" type="url" class="form-control" required="" placeholder="URL">
                                </div>
                            </div>                                                    
                            <div class="form-group">
                                <label>Number</label>
                                <div>
                                    <input data-parsley-type="number" type="text" class="form-control" required="" placeholder="Enter only numbers">
                                </div>
                            </div>                                                    
                            <div class="form-group">
                                <label>Textarea</label>
                                <div>
                                    <textarea required="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="remember-1" type="checkbox" data-parsley-multiple="remember-1">
                                    <label for="remember-1"> Remember me </label>
                                </div>
                            </div>

                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary" type="submit">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary m-l-5">
                                    Cancel
                                </button>
                            </div>

                        </form>
                        
					</div>
                </div>                        
            </div>														
        </div>	
    </div>			
</div>