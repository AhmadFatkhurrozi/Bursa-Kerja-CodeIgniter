<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	  <meta name="author" content="">
	  <link rel="icon" href="./dist/img/icon.png">
	  <title>Admin Sistem Informasi Bursa Kerja</title>

		<?php 
			echo __css('bootstrap');
			echo __css('fontawesome');
			echo __css('stars');
			echo __css('star');
		 ?>
	</head>
	<body>
		<div style="margin-top: -20px;" id='stars'></div>
		<div id='stars2'></div>
		<div id='stars3'></div>
		<div id='stars4'></div>
		<div id='stars5'></div>
		<div id='stars6'></div>
		
		
		<div class="container" id="title">
			<div class="row">
				<div class="col-md-4 offset-md-4 bg-light" style="padding: 25px 20px; box-shadow: 0 0 20px 1px lightblue;">
					<div class="text-center" style="padding-bottom: 20px;">
						<span class="title">LOGIN ADMIN</span>
					</div>
					<form action="<?=base_url('akun/masuk_admin');?>" method="post">
						<fieldset class="form-group">
							<label class="text-dark">Username</label>
							<input type="text" name="username" class="form-control" placeholder="Enter username/email" required="">
						</fieldset>
						<fieldset class="form-group">
							<label class="text-dark">Password</label>
							<input type="password" name="password" class="form-control" placeholder="Enter Password" required="">
						</fieldset>
						<fieldset class="form-group">
							<button type="submit" class="btn btn-primary form-control">Masuk
							</button>
						</fieldset>
					</form>
					<p id="notifications"><?php echo $this->session->flashdata('msg'); ?></p>
				</div>
			</div>
		</div>

		

		<?php
			echo __js('jquery'); 
			echo __js('popper');
			echo __js('bootstrap');
		 ?>

		 <script>
	    	$('#notifications').slideDown('slow').delay(3000).slideUp('slow');	
	    </script>
	 
	</body>
</html>