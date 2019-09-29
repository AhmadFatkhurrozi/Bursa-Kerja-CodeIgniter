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
		echo __css('offcanvas');
		echo __js('jquery'); 
		echo __js('offcanvas');
	 ?>
</head>
<body>
    <?php 
   		echo $header;
   	?>

<div class="container bg-transparent mbl">
	<div class="row" style="margin-top: 65px;">

		<div class="col-lg-3 bg-light" style="padding: 20px 10px;">
			
			<div class="sidebar-header text-center sembunyi">
				<?php foreach($query_pencaker->result() as $a){ ?> 
		        <div class="user-pic">
		            <img height="100" src="<?=base_url()?>dist/img/pencaker/<?=$a->FOTO;?>">
		        </div>
		        <div class="user-info">
		            <span class="user-name">
		                <strong><?=$a->NAMA_PENCAKER; ?></strong><br>
		                <small><strong>NIK.</strong><i><?=$a->NIK;?></i></small><br>
		            </span>
		           <hr class="m-y-md">
		        </div>
		        <?php } ?>
		    </div>

		    <strong><i class="fa fa-suitcase"></i> Cari Kerja</strong>

	        <div class="list-group">
	          	<?php foreach ($all as $c) { ?>
	          	<a href="<?=base_url()?>pencaker/lowongan" 
	          		class="btn-sm lst list-group-item <?php echo __menu_active('semua', $menu ); ?>">
	          		Semua (<?=$c->total;?>)
	          	</a>
	          	<?php } ?>

	          	<?php foreach ($query_kategori as $a) { ?>
	            <a href="<?=site_url('pencaker/lowonganKat/').$a->ID_KATEGORI;?>"
	            	class="btn-sm lst list-group-item <?php echo __menu_active( $a->ID_KATEGORI , $menu ); ?>">
	            	<?php echo $a->NAMA_KATEGORI; ?>(<?php echo $a->total ?>)
	            </a>
	        	<?php } ?>
	        </div>

	        <hr>

	        <strong><i class="fa fa-envelope"></i> Lamaranku</strong>

	        <div class="list-group">
	            <a href="<?=base_url();?>pencaker/bid" class="btn-sm lst list-group-item <?php echo __menu_active('lamaran', $menu ); ?>">
	            	Lamaran Saya (<?php echo $this->db->where('STATUS_BID', 0)->where('ID_PENCAKER',$this->session->userdata('__ci_pencaker_idpk'))->get('bid')->num_rows(); ?>)
	            </a>
	            <a href="<?php echo base_url(); ?>pencaker/review" class="btn-sm lst dropdown-klik list-group-item <?php echo __menu_active('review', $menu ); ?>">
	            	Hasil Review 
	             <span class="badge badge-danger count"></span>
	            </a>
	            <a href="<?php echo base_url(); ?>pencaker/history" class="btn-sm lst list-group-item <?php echo __menu_active('history', $menu ); ?>">
	            	History 
	            </a>
	        </div>

	        <hr>

	        <strong><i class="fa fa-user"></i> Akun Saya</strong>

	        <div class="list-group">
	            <a href="<?php echo base_url(); ?>pencaker/profil" class="btn-sm lst list-group-item <?php echo __menu_active('profil', $menu ); ?>">Edit Profil
	            </a>
	            <a href="<?php echo base_url(); ?>pencaker/pendidikan" class="btn-sm lst list-group-item <?php echo __menu_active('pendidikan', $menu ); ?>">Pendidikan
	            </a>
	        	<a href="<?php echo base_url(); ?>pencaker/pengalaman" class="btn-sm lst list-group-item <?php echo __menu_active('pengalaman', $menu ); ?>">Pengalaman Kerja
	        	</a>
	        	<a href="<?php echo base_url(); ?>pencaker/keahlian" class="btn-sm lst list-group-item <?php echo __menu_active('skill', $menu ); ?>">Keahlian Saya
	        	</a>
	        </div>
	        <hr>
	    </div>

		<div class="col-lg-9 bg-light mbl" style="padding: 20px 25px;">
		      <?php 
		      $review = $this->db->join('sudah_bekerja', 'review.ID_PENCAKER=sudah_bekerja.ID_PENCAKER')
		                        ->where('review.ID_PENCAKER', $this->session->userdata('__ci_pencaker_idpk'))
		                        ->where('sudah_bekerja.ID_PENCAKER', $this->session->userdata('__ci_pencaker_idpk'))
		                        ->where('HASIL_REVIEW', 'Diterima')
		                        ->get('review');

	      	if ( !$this->session->userdata("__ci_pencaker_nama")) { ?>
                      Silahkan Login Untuk Bisa Melamar Pekerjaan <a class="btn btn-success" href="<?=base_url()?>">Login</a><hr>
            <?php } else { ?>

                     
		    <?php  if ($review->num_rows() == 1 ) { ?>
                <div class="alert alert-primary">
    		       Terimakasih telah menggunakan SIBUK! Selamat Bekerja...
    		    </div>
    		    <?php }else{ ?>
    		    <div class="alert alert-warning">
    		         Klik konfirmasi jika anda sudah bekerja, jangan diklik meskipun anda sudah diterima tapi belum bekerja! <a href="<?=base_url('pencaker/sukses');?>" class="btn btn-success btn-sm">Konfirmasi</a>
    		    </div>
    		    <?php } ?>
		      
		      <?php
		      $profil = $this->db->where('ID_PENCAKER', $this->session->userdata('__ci_pencaker_idpk'))
		                       ->where('NIK', "")
                               ->where('STATUS_KAWIN', "")
                               ->where('AGAMA', "")
                               ->where('TELEPON', "")
                               ->where('ALAMAT', "")
                               ->where('FOTO', "")
                               ->where('FOTO_KTP', "")
                               ->get('pencaker');
                               
            if ($profil->num_rows() == 1 ) { ?>
            <div class="alert alert-warning">
		        Lengkapi Profil Anda! <a href="<?=base_url('pencaker/editProfil');?>" class="btn btn-success btn-sm">Edit Profil</a>
		    </div>
		    <?php }} ?>
		    
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
	 ?>
	<script>
    	$('#notifications').slideDown('slow').delay(3000).slideUp('slow');	
    </script>
	
</body>
</html>