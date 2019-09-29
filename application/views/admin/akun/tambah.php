<div class="row">
	<div class="col-12">
	  	<h2 class="text-primary">TAMBAH ADMIN</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<form action="<?php echo base_url() ?>admin/tambahkanAdmin" method="POST">
			<fieldset class="form-group">
				<label>USERNAME</label>
				<input type="text" class="form-control" placeholder="Enter username" name="username">
			</fieldset>
			<fieldset class="form-group">
				<label>PASSWORD</label>
				<input type="password" class="form-control" placeholder="Enter Password" name="password">
			</fieldset>
			<fieldset class="form-group">
				<label>NAMA LENGKAP</label>
				<input type="text" class="form-control" placeholder="Enter Nama Lengkap" name="nama_admin">
			</fieldset>
			<fieldset class="form-group">
				<label>TELEPON</label>
				<input type="text" class="form-control" placeholder="Enter No. Telp" name="telepon">
			</fieldset>
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-save"></i> Simpan
			</button>
			<a href="<?php echo base_url();?>admin/admin" class="btn btn-light">Kembali</a>
		</form>
	</div>
	<div class="col-md-6">
	</div>
</div>