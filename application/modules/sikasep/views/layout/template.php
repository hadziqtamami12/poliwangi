<!DOCTYPE html>
<html>

<head>
	<title>
		<?php echo $title ?>
	</title>
	<link href='<?php echo base_url("assets/upload/images/$favicon"); ?>' rel='shortcut icon' type='image/x-icon' />
	
	<!-- meta -->
	<?php require_once('_meta.php') ;?>

	<!-- css -->
	<?php require_once('_css.php') ;?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body>
	<div class="d-flex" id="wrapper">
		
		<!-- header -->
		<?php require_once('_sidebar.php') ;?>
		<!-- sidebar -->
		<!-- content -->
		<div id="page-content-wrapper">
			<!-- Main content -->
		<?php require_once('_nav.php') ;?>
			<div class="container">
				<?php require_once('_header.php') ;?>
				<?php echo $contents ;?>
			</div>
		</div>
		<!-- footer -->
		<?php require_once('_footer.php') ;?>

		<!-- <div class="control-sidebar-bg"></div> -->
	</div>
	<!-- js -->
	<?php require_once('_js.php') ;?>
</body>

</html>
