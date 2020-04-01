<!-- style="margin-left:60%; margin-top:10%;" -->
<div class="box-login">

	<div class="login-logo">
		<!-- <a href="<?php echo base_url(); ?>">
		<b><?php echo $site['nama_website']?></b>
		</a> -->
		<!-- <img style="max-width:30%;" src="<?php echo base_url("assets/upload/images/$favicon"); ?>" alt=""> -->
		<h4>Login User</h4>
	</div>
	<!-- /.login-logo -->
	
	<!-- <img src="<?php echo base_url("assets/upload/images/lundin.jpeg"); ?>" alt=""> -->


		<form method="post" action="<?php echo base_url('auth/login'); ?>" role="login">
		
			<div class="form-group has-feedback" id="inputan">
				<input type="text" name="username" class="form-control" required minlength="4" placeholder="Username" />
				<span class="glyphicon  glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback" id="inputan">
				<input type="password" name="password" class="form-control" required minlength="5" placeholder="Password" />
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>

			<div class="row" >		
				<div class="col-xs-12 col-sm-6 col-md-6 text-center" id="login-btn">
					<button type="submit" name="submit" value="login" class="login-button"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
				</div>
			</div>
		</form>
	</div>
	<div id="myalert">
		<?php echo $this->session->flashdata('alert', true)?>
	</div>
</div>
<script>
	$(function() {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
	$('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);
</script>
