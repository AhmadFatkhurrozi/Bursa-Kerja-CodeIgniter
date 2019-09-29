<div class="row">
	<div class="col-12">
	  	<h4 class="text-primary">EDIT DATA PENGANGGURAN</h4><hr>
	</div>
</div>
<?php foreach($query_pengangguran as $a){ ?>
<div class="row">
	<div class="col-md-6">
		<form action="<?php echo base_url();?>admin/ubahPengangguran" method="post">
			<fieldset>
				<input type="hidden" class="form-control" name="id" value="<?php echo $a->ID_PENGANGGURAN; ?>">
			</fieldset>
			<fieldset>
				<label>Tahun</label>
				<input type="text" class="form-control" name="tahun" value="<?php echo $a->TAHUN; ?>" readonly>
			</fieldset>
			<fieldset class="form-group">
				<label>Jumlah</label>
				<input type="text" class="form-control" name="jumlah" value="<?php echo $a->JUMLAH; ?>">
			</fieldset>
			<button type="submit" class="btn btn-primary btn-sm">
				<i class="fa fa-refresh"></i> Perbarui
			</button>
			<a href="<?php echo base_url();?>admin/pengangguran" class="btn btn-light btn-sm">Kembali</a>
		</form>
		<?php } ?>
	</div>
	<div class="col-md-6">
	</div>
</div>