

	<img class="wave" src="<?php base_url(); ?> assets/login/img/wave.png">
	<div class="container mt-5">
		<div class="img">
			<!-- <img src="<?php base_url(); ?> assets/login/img/bg.svg"> -->
			<img src="<?php base_url(); ?> assets/login/img/bg.svg">
		</div>
		<div class="login-content">
			<form method="post" action="<?php echo base_url('auth/login'); ?>" role="login">
				<img src="<?php base_url(); ?> assets/login/img/poliwangi.png">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="text" class="input" name="username" placeholder="Username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" class="input" id="password" name="password" placeholder="Password">
            	   </div>
            	</div>
           		 <div class="icon-showpassword">
           		 	<!-- <i class="fa fa-eye" id="showPassword" onclick="showPassword()"></i> -->
           		 	<i class="fa fa-eye" id="showPassword"></i>
           		 </div>
            	<!-- <a href="#">Forgot Password?</a> -->
            	<button type="submit" name="submit" class="btn" value="login">Login</button>
            </form>
            <div id="myalert" class="fixed-top">
           		<?php echo $this->session->flashdata('alert', true)?>
        	</div>
        </div>
        
    </div>

<script>

    	const showPassword = document.querySelector('#showPassword');
		const password = document.querySelector('#password');
		showPassword.addEventListener('click', function (e) {
		    // toggle the type attribute
		    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
		    password.setAttribute('type', type);
		    // toggle the eye slash icon
		    this.classList.toggle('fa-eye-slash');
		});

  $(function() {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  $('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);
//   function showPassword() {

//   var x = document.getElementById("password");
//   if (x.type === "password") {
//     x.type = "text";
    
//   } else {
//     x.type = "password";
//   }
// }
</script>

<a href='https://www.freepik.com/free-photos-vectors/design'>Design vector created by freepik - www.freepik.com</a>

