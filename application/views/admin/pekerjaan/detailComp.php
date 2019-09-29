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
      <a href="<?=base_url()?>admin/pekerjaan">Lowongan</a>
    </h6>
    <h6 class="breadcrumb-item active"> Detail Perusahaan</h6>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <h5>
      <i class="fa fa-suitcase"></i>
      <span>Detail Perusahaan</span>
    </h5>
  </div>
  <form>
  <div class="card-body">
  
<?php foreach ($query_comp as $a) { ?>
<div class="row">  
	<div class="col-md-2 text-center" style="margin-top: 20px;">
		<img class="img-fluid ml-sm-4" width="100" src="<?=base_url();?>dist/img/company/<?=$a->LOGO_PERUSAHAAN; ?>">
	</div>
	<div class="col-md-4">
		<strong class="short-username h4">
			<i class="fa fa-building mt-3"></i>
			 <?=$a->NAMA_PERUSAHAAN;?>
		</strong><hr>
		<strong>No. SIUP :</strong><i> <?=$a->NO_SIUP?></i><br>
		<strong>No. SITU :</strong><i> <?=$a->NO_SITU?></i>
		<br><br>
		<p>Dibuat pada <?=date_indo($a->DIBUAT_PADA);?></p>
	</div>
	<div class="col-md-6">
		<table class="table-sm">
			<tbody>
				<tr>
					<td><strong>Bidang</strong></td>
					<td>:</td>
					<td><i><?=$a->BIDANG_USAHA?></i></td>
				</tr>
				<tr>
					<td><strong>Deskripsi</strong></td>
					<td>:</td>
					<td><i><?=$a->DESKRIPSI_PERUSAHAAN?></i></td>
				</tr>
				<tr>
					<td><strong>Slogan</strong></td>
					<td>:</td>
					<td><i><?=$a->SLOGAN?></i></td>
				</tr>
				<tr>
					<td><strong>Telepon</strong></td>
					<td>:</td>
					<td><i><?=$a->TELEPON?></i></td>
				</tr>
				<tr>
					<td><strong>Email</strong></td>
					<td>:</td>
					<td><i><?=$a->EMAIL?></i></td>
				</tr>
				<tr>
					<td><strong>Website</strong></td>
					<td>:</td>
					<td><a href="https://<?=$a->WEBSITE?>"><?=$a->WEBSITE?></a></td>
				</tr>
				<tr>
					<td><strong>Alamat</strong></td>
					<td>:</td>
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
<a href="<?php echo base_url();?>admin/pekerjaan" class="btn btn-light">Kembali</a>
	<?php } ?>
    
  </div>
</div>