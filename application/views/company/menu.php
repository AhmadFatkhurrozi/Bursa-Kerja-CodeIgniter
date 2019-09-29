<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="./dist/img/icon.png">
	<title>Sistem Informasi Bursa Kerja</title>

<?php 
	echo __css('bootstrap');
	echo __css('fontawesome');
	echo __css('sibuk');
	echo __js('tiny');
	echo __js('jquery'); 
 ?>
 
</head>

<body>

<?php 
	echo $header;
?>

<div class="container">
	<div class="row" style="margin-top: 65px;">
		<div class="col-lg-3 bg-light" style="padding: 20px 10px;">
            
			<div class="sidebar-header text-center">
			    <?php foreach( $query_profil->result() as $a ){ ?>
	            <div class="user-pic">
	                <img height="100" src="<?=base_url()?>dist/img/company/<?=$a->LOGO_PERUSAHAAN;  ?>">
	            </div>
	            <?php } ?>
	            <div class="user-info">
	                <span class="user-name">
	                    <h4><?php echo $this->session->userdata("__ci_perusahaan_nama"); ?></h4>
	                    <i><?php echo $this->session->userdata("__ci_perusahaan_siup"); ?></i><br>
	                    <i><?php echo $this->session->userdata("__ci_perusahaan_situ"); ?></i>
	                </span>
	               <hr class="m-y-md">
	            </div>
	        </div>

		  	<strong class="text-dark"><i class="fa fa-suitcase"></i> Manage Lowongan</strong>
		    <div class="list-group">
		    	<a style="padding-top: 5px; padding-bottom: 5px;" href="<?php echo base_url()?>company/tambahLowongan" class="btn-sm list-group-item <?php echo __menu_active('tambahlow', $menu ); ?>">
		        	<i class="fa fa-plus"></i> Tambah Data Lowongan
		        </a>
		        <a style="padding-top: 5px; padding-bottom: 5px;" href="<?php echo base_url()?>company/lowongan" class="btn-sm list-group-item <?php echo __menu_active('lowongan', $menu ); ?>">
		        	Data Lowongan
		        </a>
		        <a style="padding-top: 5px; padding-bottom: 5px;" href="<?=base_url()?>company/bid" class="btn-sm list-group-item <?php echo __menu_active('bid', $menu ); ?>"> 
					BID <span class="badge badge-danger countbid"></span>
				</a>
				<a style="padding-top: 5px; padding-bottom: 5px;" href="<?=base_url()?>company/review" class="btn-sm list-group-item <?php echo __menu_active('review', $menu ); ?>"> 
					Review
				</a>
		    </div><br>
		    
		    <strong class="text-dark"><i class="fa fa-building"></i> Company Profile</strong>
		    <div class="list-group">
				<a style="padding-top: 5px; padding-bottom: 5px;" href="<?=base_url()?>company/profil" class="btn-sm list-group-item <?php echo __menu_active('editprofil', $menu ); ?>"> 
					Edit Profil
				</a>
			</div><br>

    	</div>
    
		<div class="col-lg-9 bg-light mbl" style="padding: 20px 15px;">
		    
		    <?php 
		      $profil = $this->db->where('ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
		                       ->where('NO_SIUP', "-")
                               ->where('NO_SITU', "-")
                               ->where('BIDANG_USAHA', "-")
                               ->where('ALAMAT', "-")
                               ->where('TELEPON', "-")
                               ->where('DESKRIPSI_PERUSAHAAN', "-")
                               ->where('WEBSITE', "-")
                               ->get('perusahaan');
                               
            if ($profil->num_rows() == 1 ) { ?>
            <div class="alert alert-warning">
		        Lengkapi Profil Perusahaan Anda! <a href="<?=base_url('company/editProfil');?>" class="btn btn-success btn-sm">Edit Profil</a>
		    </div>
		    <?php } ?>
		    
			<?php echo $lihat; ?>
		</div>

	</div>
</div>			
	
<?php
  	echo $footer; 
?>

<?php
	echo __js('popper');
	echo __js('bootstrap');
	echo __js('checkall');
    echo __js('_checkall');
 ?>
  <script>
	$('#notifications').slideDown('slow').delay(3000).slideUp('slow');
  </script>

</body>
</html>