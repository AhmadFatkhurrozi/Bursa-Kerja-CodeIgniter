<div class="row">
	<div class="col-12">
	  	<h4 class="text-primary" style="padding-left: 5px; border-left: 5px solid">TAMBAH KATEGORI</h4>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-6">
		<form action="<?php echo base_url() ?>admin/tambahkanKategori" method="POST">
			<fieldset class="form-group">
				<label>NAMA KATEGORI</label>
				<input type="text" class="form-control" placeholder="Enter Kategori" name="nama_kategori" required="required">
			</fieldset>
			<button type="submit" class="btn btn-primary btn-sm">
				<i class="fa fa-save"></i> Simpan
			</button>
			<a href="<?php echo base_url();?>admin/kategori" class="btn btn-light btn-sm">Kembali</a>
		</form>
	</div>
	<div class="col-md-6">
	</div>
</div>