<div class="row">

<div class="col-md-6">
	<h4><i class="fa fa-search"></i> <?php echo 'Hasil Pencarian dari "'.$keyword.'"';  ?></h4>
</div>
<div class="col-md-6 sembunyi">
	
</div>
<div class="col-md-12" id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
</div>

<?php if ($query_lowongan->num_rows() == 0) { ?>
	<hr>
	<center>Tidak ada hasil</center>
<?php }else{ foreach ($query_lowongan->result() as $a) { ?>
<div class="row alert alert-dark">  
	<div class="col-md-2">
	<a href=""> <img class="media-object img-fluid img-rounded sembunyi" 
		src="<?=base_url();?>dist/img/company/<?=$a->LOGO_PERUSAHAAN; ?>">
	</a>
	<br>
		<a style="text-decoration: none; font-size: 14px;margin-left: -20px;" class="text-dark" href="<?php echo site_url('pencaker/detailComp/').$a->ID_PERUSAHAAN; ?>"><i class="fa fa-building"></i> <strong><?=$a->NAMA_PERUSAHAAN;?></strong></a>
	<br>
</div>	

<div class="col-md-10">
	<div class="alert alert-info">
		<div class="h4">
			<a href="<?php echo site_url('pencaker/lowonganDetail/').$a->ID_LOWONGAN; ?>" class="text-info"><?php echo $a->JUDUL; ?></a>
		</div>
		<hr>
		<div class="h5">
			<span class="badge badge-primary">Gaji : <?=$a->GAJI;?></span>
			<span class="badge badge-warning">Kategori : <?=$a->NAMA_KATEGORI;?></span>
			<span class="badge badge-primary">Kuota : <?php echo $a->KUOTA; ?></span>
			<span class="badge badge-danger"> Jumlah pelamar: <?php echo $this->db->where('ID_LOWONGAN', $a->ID_LOWONGAN)->get('bid')->num_rows(); ?></span>
		</div>
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

	<div class="btn-group">
		<?php 
			$where 	= $this->db->where('ID_PENCAKER', $this->session->userdata('__ci_pencaker_idpk') )
			  				   ->where('ID_LOWONGAN', $a->ID_LOWONGAN)
			  				   ->get('bid');

			$tgl 	= $this->db->where('ID_LOWONGAN', $a->ID_LOWONGAN)
			  				   ->get('lowongan');

			$date_now = date("Y-m-d");
		 ?> 
		
		<?php if ($date_now > $a->TGL_SELESAI) { ?>

			<button class="btn btn-danger btn-sm">
				<i class="fa fa-times"></i> Lowongan Berakhir
			</button>
				
		<?php } elseif ($where->num_rows() == 0 ) { ?>

			<a href="<?php echo site_url('pencaker/kirimBid/').$a->ID_LOWONGAN; ?>" class="btn btn-primary btn-sm" title="">
				<i class="fa fa-send"></i> Lamar 
			</a>
		<?php } else { ?>
			<button class="btn btn-success btn-sm">
				<i class="fa fa-check"></i> Lamaran Terkirim
			</button>
		<?php } ?>
		<a href="<?php echo site_url('pencaker/lowonganDetail/').$a->ID_LOWONGAN; ?>" class="btn btn-info btn-sm" title=""><i class="fa fa-info-circle"></i> Lihat Detail</a>
	</div>
</div>
</div>
<hr>
<?php }}?>

<div class="row">
	<div class="col-md-12">
		
	</div>
</div>