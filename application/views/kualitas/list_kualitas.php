<div class="content">            
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Data Kualitas Barang</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">Kualitas</li>
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
                        <h3 class='box-title'><?php echo anchor('kualitas/create', '<i class="fa fa-plus"> </i>Tambah Data', array('class' => 'btn btn-primary')); ?>
                        </h3>
                    </div>                        
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="mytable" class="table table-bordered table-hover display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kualitas</th>
                                        <th>Persentase</th>                                       
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>										
                                <tbody>                                   
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>                        
            </div>														
        </div>	
    </div>			
</div>
<script src="<?php echo base_url('assets/plugins/datatables/jQuery-2.1.4.min.js') ?>"></script>
<script>
    $(document).ready(function () {
        $.fn.dataTable.ext.errMode = 'throw';
        $('#mytable').dataTable({
            "Processing": true,
            "ServerSide": true,
            "iDisplayLength": 25,
            "bDestroy": true,
            "oLanguage": {
                "sSearch": "Search Data :  ",
                "sZeroRecords": "No records to display",
                "sEmptyTable": "No data available in table"
            },
            "ajax": "<?php echo base_url('kualitas/view_data'); ?>",
            "columns": [
                {"mData": "no"},                    
                {"mData": "kd_kualitas"},
                {"mData": "persentase"},
                {"mData": "keterangan"},
                {"mData": "aksi"},
            ]
        });
    });

</script>