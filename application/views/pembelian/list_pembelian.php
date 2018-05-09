<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Pembelian Barang</h1>
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
                        <h3 class='box-title'><?php echo anchor('pembelian/create', '<i class="fa fa-plus"> </i>Tambah Data', array('class' => 'btn btn-primary btn-sm')); ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="mytable" class="table table-bordered table-hover display">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Nota</th>
                                    <th>Tanggal</th>
                                    <th>Grand Total</th>
                                    <th>Supplier</th>
                                    <th>Keterangan</th>
                                    <th>User</th>
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
            "ajax": "<?php echo base_url('pembelian/view_data'); ?>",
            "columns": [
                {"mData": "no"},
                {"mData": "no_transaksi"},
                {"mData": "tanggal"},
                {"mData": "grand_total"},
                {"mData": "nama_supplier"},
                {"mData": "keterangan"},
                {"mData": "user"},
                {"mData": "aksi"},
            ]
        });
    });

</script>