<div class="row">
	<div class="col-12">
	  	<h4 class="text-primary" style="padding-left: 5px; border-left: 5px solid">TAMBAH DATA</h4>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-6">
		<form action="<?php echo base_url() ?>admin/tambahkanPengangguran" method="POST">
			<fieldset class="form-group">
				<label>Tahun</label>
				<input type="text" class="form-control" placeholder="Exp. '2018'" name="tahun" required="required">
			</fieldset>
			<fieldset class="form-group">
				<label>Jumlah</label>
				<input type="number" class="form-control" placeholder="Masukkan Jumlah Pengangguran" name="jumlah" required="required">
			</fieldset>
			<button type="submit" class="btn btn-primary btn-sm">
				<i class="fa fa-save"></i> Simpan
			</button>
			<a href="<?php echo base_url();?>admin/Pengangguran" class="btn btn-light btn-sm">Kembali</a>
		</form>
	</div>
	<div class="col-md-6">
	</div>
</div>