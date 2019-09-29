<div class="row">
	<div class="col-md-12" id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
		
<?php foreach ($query_lowongan as $a) { ?>

<div class="row">
	<div class="col-md-12">
		<div class="alert alert-info">
			<div class="card-title h3">
				<?php echo $a->JUDUL; ?>
			</div>
			<hr>
			<div class="card-text">
				<i><b>DESKRIPSI :</b></i>
				<p style="white-space: pre-line;"><?php echo $a->DESKRIPSI; ?></p>
			</div>
			<div class="h5">
				<span class="badge badge-primary">Gaji : <?=$a->GAJI;?></span>
				<span class="badge badge-warning">Kategori : <?=$a->NAMA_KATEGORI;?></span>
				<span class="badge badge-danger"> Jumlah pelamar: <?php echo $this->db->where('ID_LOWONGAN', $a->ID_LOWONGAN)->get('bid')->num_rows(); ?></span>
			</div>
			<br>
			<div class="text-center">
				<img class="img-fluid img-thumbnail" width="500" src="<?=base_url();?>dist/img/lowongan/<?=$a->GAMBAR; ?>">
			</div>
			<br>
			<div class="text-dark" style="font-size: 14px;">
				<span>Tanggal Posting	: <?php echo mediumdate_indo($a->TGL_MULAI); ?><br></span>
				<span>Lowongan Berakhir : <?php echo mediumdate_indo($a->TGL_SELESAI); ?><br></span>
			</div>
		</div>
		<div>
			<a href="<?php echo base_url();?>company/lowongan" class="btn btn-light">Kembali</a>
		</div>
	</div>
	</div>
	<hr>
	<?php } ?>