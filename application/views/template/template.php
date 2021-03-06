<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Dashboard Admin Toko Mas Ikan Mas</title>		
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png">
		<!-- Switchery css -->
		<link href="<?php echo base_url();?>assets/plugins/switchery/switchery.min.css" rel="stylesheet" />		
		<!-- Bootstrap CSS -->
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />	
		<!-- DATA TABLES -->
		<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet">	
		<!-- Font Awesome CSS -->
		<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />		
		<!-- Custom CSS -->
		<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />	
		<link href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" >
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datetimepicker.min.css" >
		
		<!-- BEGIN CSS for this page -->

		<!-- END CSS for this page -->
				
</head>
<body class="adminbody">
<div id="main">

	<!-- top bar navigation -->
	<?php echo $_header; ?>
	<!-- End Navigation -->
 
	<!-- Left Sidebar -->
	<?php echo $_sidebar; ?>
	<!-- End Sidebar -->

    <div class="content-page">	
		<!-- Start content -->
        <?php echo $_content; ?> 
		<!-- END content -->
    </div>
	<!-- END content-page -->
    
	<footer class="footer">
		<span class="text-right">
		Copyright &copy; 2018 <a href="<?php echo base_url('home');?>">Toko Mas Ikan Mas</a>
		</span>
		<span class="float-right">
		Powered by <a target="_blank" href="https://nexterweb.id"><b>Nexterweb.id</b></a>
		</span>
	</footer>

</div>
<!-- END main -->

<script src="<?php echo base_url();?>assets/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/moment.min.js"></script>

<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js'); ?>"></script>

<script src="<?php echo base_url();?>assets/js/detect.js"></script>
<script src="<?php echo base_url();?>assets/js/fastclick.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/switchery/switchery.min.js"></script>

<!-- App js -->
<script src="<?php echo base_url();?>assets/js/pikeadmin.js"></script>
<script src="<?php echo base_url()?>assets/plugins/select2/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/locales/bootstrap-datepicker.id.js"></script>
<script>								
$(document).ready(function() {
    $('.select2').select2();
});
$(document).ready(function() {
    $('.select').select2();
});
$("#datepicker").datepicker({
	autoclose: true  
});
</script>

</body>
</html>