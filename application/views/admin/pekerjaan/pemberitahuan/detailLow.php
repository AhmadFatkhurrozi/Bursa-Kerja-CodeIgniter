<style>
.btn-gbr{
        height: 30px;
      }
</style>
<ol class="breadcrumb">
    <h6 class="breadcrumb-item">
      <i class="fa fa-home"></i>
      <a href="<?=base_url()?>admin">Dashboard</a>
    </h6>
    <h6 class="breadcrumb-item">
      <a href="<?=base_url()?>admin/addLowongan">Pemberitahuan</a>
    </h6>
    <h6 class="breadcrumb-item active"> Detail Lowongan</h6>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <h5>
      <i class="fa fa-suitcase"></i>
      <span>Detail Lowongan Pekerjaan</span>
    </h5>
  </div>
  <form>
  <div class="card-body">
  
<?php foreach ($query_lowongan as $a) { ?>
<div class="row">  
	<div class="col-md-2 text-center" style="margin-top: 20px;">
		<img class="img-fluid ml-sm-4" width="100" src="<?=base_url();?>dist/img/company/<?=$a->LOGO_PERUSAHAAN; ?>">
	</div>
	<div class="col-md-4">
		<strong class="short-username h4">
			<i class="fa fa-building mt-3"></i>
			 <?=$a->NAMA_PERUSAHAAN;?>
		</strong><br>
		<strong>No. SIUP :</strong><i> <?=$a->NO_SIUP?></i><br>
		<strong>No. SITU :</strong><i> <?=$a->NO_SITU?></i>
		<br><hr>
		<p>Dibuat pada <?=date_indo($a->DIBUAT_PADA);?></p>
	</div>
	<div class="col-md-6">
		<table>
			<tbody>
				<tr>
					<td><strong>Bidang</strong></td>
					<td> : </td>
					<td><i><?=$a->BIDANG_USAHA?></i></td>
				</tr>
				<tr>
					<td><strong>Deskripsi</strong></td>
					<td> : </td>
					<td><i><?=$a->DESKRIPSI_PERUSAHAAN?></i></td>
				</tr>
				<tr>
					<td><strong>Slogan</strong></td>
					<td> : </td>
					<td><i><?=$a->SLOGAN?></i></td>
				</tr>
				<tr>
					<td><strong>Telepon</strong></td>
					<td> : </td>
					<td><i><?=$a->TELEPON?></i></td>
				</tr>
				<tr>
					<td><strong>Email</strong></td>
					<td> : </td>
					<td><i><?=$a->EMAIL?></i></td>
				</tr>
				<tr>
					<td><strong>Website</strong></td>
					<td> : </td>
					<td><a href="https://<?=$a->WEBSITE?>"><?=$a->WEBSITE?></a></td>
				</tr>
				<tr>
					<td><strong>Alamat</strong></td>
					<td> : </td>
					<td><i><?=$a->ALAMAT?></i></td>
				</tr>
				<tr>
					<td colspan="3"><a href="<?=base_url()?>admin/maps/<?=$a->ID_PERUSAHAAN;?>" target="_blank" class="btn btn-success"><i class="fa fa-map-marker"></i> Lihat Lokasi Perusahaan</a></td>
				</tr>
			</tbody>
		</table>
	</div>	
</div>
<hr>
<div class="row">
	<div class="col-md-12 text-dark">
		<div class="alert alert-dark">
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
			
			<a href="<?php echo base_url();?>admin/addLowongan" class="btn btn-light">Kembali</a>
		</div>
	</div>
	</div>
	<?php } ?>
    
  </div>
</div>