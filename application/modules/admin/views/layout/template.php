<!DOCTYPE html>
<html>

<head>
	<title>
		<?php echo $title ?>
	</title>
	<link href='<?php echo base_url("assets/upload/images/$favicon"); ?>' rel='shortcut icon' type='image/x-icon' />
	
	<!-- meta -->
	<?php require('_meta.php') ;?>

	<!-- css -->
	<?php require('_css.php') ;?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body>
	<div class="d-flex" id="wrapper">
		
		<!-- header -->
		<?php require('_sidebar.php') ;?>
		<!-- sidebar -->
		<!-- content -->
		<div id="page-content-wrapper">
			<!-- Main content -->
		<?php require('_nav.php') ;?>
			<div class="container">
				<?php require('_header.php') ;?>
				<?php echo $contents ;?>
			</div>
		</div>
		<!-- footer -->
		<?php require('_footer.php') ;?>

		<!-- <div class="control-sidebar-bg"></div> -->
	</div>
	<!-- js -->
	<?php require('_js.php') ;?>
</body>

</html>
