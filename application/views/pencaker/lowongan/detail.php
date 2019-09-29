<div class="row">
	<div class="col-md-12" id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
</div>

<?php foreach ($query_lowongan as $a) { ?>
<div class="row">  
		<div class="col-md-2">
		<a href=""> <img class="img-fluid img-thumbnail ml-sm-4" width="80"  
			src="<?=base_url();?>dist/img/company/<?=$a->LOGO_PERUSAHAAN; ?>">
		</a>	
	</div>
	<div class="col-md-10">
		<a class="short-username h4" href="<?php echo site_url('pencaker/detailComp/').$a->ID_PERUSAHAAN; ?>">
			<strong>
				<i class="fa fa-building mt-3"></i>
				 <?=$a->NAMA_PERUSAHAAN;?>
			</strong>
		</a>
	</div>	
</div>
<hr>
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
				<span class="badge badge-primary">Kuota : <?php echo $a->KUOTA; ?></span>
				<span class="badge badge-danger"> Jumlah pelamar: <?php echo $this->db->where('ID_LOWONGAN', $a->ID_LOWONGAN)->get('bid')->num_rows(); ?></span>
			</div>
			<br>
			<div class="text-center">
				<img class="img-fluid" width="600" src="<?=base_url();?>dist/img/lowongan/<?=$a->GAMBAR; ?>">
			</div>
			<br>
			<div class="text-dark">
				<table>
					<tbody style="font-size: 14px">
						<tr>
							<td>Mulai</td>
							<td>:</td>
							<td><?php echo mediumdate_indo($a->TGL_MULAI); ?></td>
						</tr>
						<tr>
							<td>Berakhir</td>
							<td>:</td>
							<td><?php echo mediumdate_indo($a->TGL_SELESAI); ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div>
			<?php 
				$where = $this->db->where('ID_PENCAKER', $this->session->userdata('__ci_pencaker_idpk') )
						  		  ->where('ID_LOWONGAN', $a->ID_LOWONGAN)
						   		  ->get('bid');

				$tgl 	= $this->db->where('ID_LOWONGAN', $a->ID_LOWONGAN)
			  				   ->get('lowongan');

				$date_now = date("Y-m-d");
			?> 
			<?php if ($date_now > $a->TGL_SELESAI) { ?>

			<button class="btn btn-danger">
				<i class="fa fa-times"></i> Lowongan Berakhir
			</button>
				
			<?php } elseif ($where->num_rows() == 0 ) { ?>
				<a href="<?php echo site_url('pencaker/kirimBid/').$a->ID_LOWONGAN; ?>" class="btn btn-primary" title="">
					<i class="fa fa-send"></i> Lamar 
				</a>
			<?php } else { ?>
				<button class="btn btn-success">
					<i class="fa fa-info-circle"></i> Lamaran Terkirim
				</button>
			<?php } ?>
			<a href="<?php echo base_url();?>pencaker/lowongan" class="btn btn-light">Kembali</a>
		</div>
	</div>
	</div>
	<hr>
	<?php } ?>