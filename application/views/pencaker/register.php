<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="./dist/img/icon.png">
	<title>Sistem Informasi Bursa Kerja</title>

	<?php 
		echo __css('bootstrap');
		echo __css('fontawesome');
		echo __css('sibuk');
	 ?>

</head>
<body>
   <?php 
   		echo $header;
   	?>

   	<div class="container" style="margin-top: 70px; margin-bottom: 30px;">
	<div class="row">
		<div class="col-md-6 jdl sembunyi">
			<h4 class="text-warning">Syarat & Ketentuan</h4>
			<hr>
			<div class="alert alert-warning" style="box-shadow: 0 0 30px 1px grey;">
				<ul class="list-unstyled">
					<li>1. Isi semua form data.</li>
					<li>2. Pastikan Email yang anda masukkan aktif, karena digunakan untuk memverifikasi akun agar dapat menggunakan sistem.</li>
					<li>3. Jika ada kesamaan Username/ Email, Daftar kembali dengan Username/Email yang berbeda.</li>
					<li>4. Jika Daftar Berhasil, masuk ke email terdaftar untuk memverifikasi akun.</li>
					<li>5. Setelah verifikasi berhasil, silahkan login.</li>
					<li>6. Selamat menggunakan Sistem Informasi Bursa Kerja, Semoga dapat menemukan pekerjaan Impian Anda!</li>
				</ul>
			</div>
		</div>
		<div class="col-md-6 bg-light lgn mlgn" style="box-shadow: 0 0 30px 1px grey;">
			<h3 class="text-secondary">Buat akun Pencaker</h3>
			<br>
			<form action="<?php echo base_url() ?>akun/tambahkanPencaker" method="POST">
				<fieldset class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" class="form-control" name="namalengkap" placeholder="Masukkan nama lengkap anda" required></input>
				</fieldset>
				<fieldset class="form-group">
					<label class="radio-inline"> Jenis Kelamin
						<input type="radio" name="jk" value="Laki-laki" required> Laki-laki
						<input type="radio" name="jk" value="Perempuan" required> Perempuan
					</label>
				</fieldset>
				<fieldset class="form-group">
					<label>Tempat tanggal lahir</label>
					<label class="form-inline">
						<input type="text" name="tmp" class="form-control" placeholder="masukkan tempat lahir" required></input>
						<input type="date" name="tgl" class="form-control" required>
					</label>
				</fieldset>
				<fieldset class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" placeholder="Masukkan Email" required>
					<small><i><b>* Pastikan Email aktif, Untuk verifikasi akun</b></i></small>
				</fieldset>
				<fieldset class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" placeholder="Masukkan Username" required></input>
				</fieldset>
				<fieldset class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
				</fieldset>
				<button type="submit" class="btn btn-secondary">
					<i class="fa fa-pencil-square-o"></i> DAFTAR
				</button>
				<p id="notifications"><?php echo $this->session->flashdata('msg'); ?></p>
			</form>
			<br>
			<p>Daftar Perusahaan ?<a href="<?php echo base_url() ?>akun/reg_comp"> Daftar</a></p>
			<p>Sudah punya akun ?<a href="<?php echo base_url() ?>"> Masuk</a></p>
		</div>
		<div class="clear"> </div>
	</div>
</div>

   <?php
      	echo $footer; 
    ?>
	
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