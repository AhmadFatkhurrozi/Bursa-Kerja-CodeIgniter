<div class="row">
	<div class="col-12">
	  	<h4 class="text-primary">EDIT KATEGORI</h4><hr>
	</div>
</div>
<?php foreach($query_kategori as $a){ ?>
<div class="row">
	<div class="col-md-6">
		<form action="<?php echo base_url();?>admin/ubahKategori" method="post">
			<fieldset class="form-group">
				<label>ID KATEGORI</label>
				<input type="text" class="form-control" placeholder="Masukkan username" name="id_kategori" value="<?php echo $a->ID_KATEGORI; ?>" readonly>
			</fieldset>
			<fieldset class="form-group">
				<label>NAMA KATEGORI</label>
				<input type="text" class="form-control" placeholder="Masukkan username" name="nama_kategori" value="<?php echo $a->NAMA_KATEGORI; ?>">
			</fieldset>
			<button type="submit" class="btn btn-primary btn-sm">
				<i class="fa fa-refresh"></i> Perbarui
			</button>
			<a href="<?php echo base_url();?>admin/kategori" class="btn btn-light btn-sm">Kembali</a>
		</form>
		<?php } ?>
	</div>
	<div class="col-md-6">
	</div>
</div>