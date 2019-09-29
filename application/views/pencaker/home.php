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
	 ?>
   
</head>
<body>
   <?php 
   		echo $header;
    ?>
    <div class="container" style="padding-top: 25px;">
      <div class="row">

        <div class="col-md-9 bg-light">
          <?php echo $slider; ?>
          <div class="card">
            <div class="card-header">
              <form class="form-inline mt-2 mt-md-0" action="<?=base_url()?>pencaker/lowonganSearch" method="post">
                <input class="form-control mr-sm-2" name="cari" type="text" placeholder="loker/perusahaan/lokasi" aria-label="Search" required="">
                <button class="btn btn-info my-2 my-sm-0" type="submit">Cari</button>
              </form>
            </div>
            <div class="card-body">

              <h4 class="text-warning" style="border-left: 5px solid; padding: 2px 5px;"> Lowongan Kerja Terbaru</h4>
              <hr>
              <?php foreach ($query_lowongan as $a) { ?>
              <div class="row"> 
                <div class="col-md-12">
                    <div style="display: inline-block;">
                      <a href="<?php echo site_url('pencaker/lowonganDetail/').$a->ID_LOWONGAN; ?>" class="text-primary" style="font-size: 18px"><?php echo $a->JUDUL; ?>
                      </a>
                     </div>
                     <br>
                      <span class="badge badge-info">
                        Berakhir pada <?php echo mediumdate_indo($a->TGL_SELESAI); ?>
                      </span>
                      <?php $tgl      = $this->db->where('ID_LOWONGAN', $a->ID_LOWONGAN)
                                           ->get('lowongan');
                            $date_now = date("Y-m-d"); ?> 
    
                      <?php if ($date_now > $a->TGL_SELESAI) { ?>
                      <span class="badge badge-danger">
                        <i class="fa fa-times"></i> Berakhir
                      </span>
                      <?php } else { ?>
                      <span class="badge badge-success">
                        <i class="fa fa-refresh"></i>
                      </span>
                      <?php } ?>
                      <br>
                      <small>
                        Diposting Oleh 
                        <a style="font-size: 15px;" class="text-dark" href="<?php echo site_url('pencaker/detailComp/').$a->ID_PERUSAHAAN; ?>">
                          <strong><?=$a->NAMA_PERUSAHAAN;?></strong>
                        </a>
                        pada <?=mediumdate_indo($a->TGL_MULAI);?>
                      </small>
                </div>
              </div>
              <hr>
              <?php } ?>

              <br>

              <h4 class="text-warning pend" style="border-left: 5px solid; padding: 2px 5px;"> Lowongan Berdasarkan Tingkat Pendidikan</h4>
              <hr>
              <div class="row pend">
                <div class="col-md-3">
                  <div class="card alert alert-info" style="box-shadow: 0 0 10px 1px black;">
                    <div class="card-body text-center">
                      <u><strong>Tidak ada</strong></u>
                      <h1 class="text-primary">
                        <?php if($null[0]->total==''){echo "0";}else{ echo $null[0]->total;}; ?></h1>
                      <p>Kuota lowongan</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card alert alert-info" style="box-shadow: 0 0 10px 1px black;">
                    <div class="card-body text-center">
                      <u><strong>SMP/ MTS</strong></u>
                      <h1 class="text-primary">
                        <?php if($smp[0]->total==''){echo "0";}else{ echo $smp[0]->total;}; ?></h1>
                      <p>Kuota lowongan</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card alert alert-info" style="box-shadow: 0 0 10px 1px black;">
                    <div class="card-body text-center">
                      <u><strong>SMA/ SMK</strong></u>
                      <h1 class="text-primary">
                        <?php if($sma[0]->total==''){echo "0";}else{ echo $sma[0]->total;}; ?></h1>
                      <p>Kuota lowongan</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card alert alert-info" style="box-shadow: 0 0 10px 1px black;">
                    <div class="card-body text-center">
                      <u><strong>D3/ S1</strong></u>
                      <h1 class="text-primary">
                        <?php if($sarjana[0]->total==''){echo "0";}else{ echo $sarjana[0]->total;}; ?></h1>
                      </h1>
                      <p>Kuota lowongan</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="card-body">
              <div class="row text-center alert-dark" style="padding: 10px 0px;">
                <div class="col-md-4">
                    <strong><i class="fa fa-search"></i> CARI</strong>
                    <p>Cari pekerjaan yang sesuai dengan passion anda</p>
                </div>
                <div class="col-md-4">
                    <strong><i class="fa fa-send"></i> BID</strong>
                    <p>Kirim Lamaran</p>
                </div>
                <div class="col-md-4">
                    <strong><i class="fa fa-suitcase"></i> KERJA</strong>
                    <p>Tunggu keputusan oleh perusahaan</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-3"  style="padding-top: 30px;">
          <div class="card">
            <div class="card-body bg-light kal">
              <center><?php echo $kalender ?></center>
            </div>
            <hr>
            <div class="card-body bg-light">
              <strong><i class="fa fa-suitcase"></i> Lowongan Kategori</strong>
              <div class="list-group">
                  <?php foreach ($all as $c) { ?>
                  <a href="<?=base_url()?>pencaker/lowongan" 
                    class="btn-sm lst list-group-item <?php echo __menu_active('semua', $menu ); ?>">
                    Semua (<?=$c->total;?>)
                  </a>
                  <?php } ?>

                  <?php foreach ($query_kategori as $a) { ?>
                  <a href="<?=site_url('pencaker/lowonganKat/').$a->ID_KATEGORI;?>"
                    class="btn-sm lst list-group-item">
                    <?php echo $a->NAMA_KATEGORI; ?>(<?php echo $a->total ?>)
                  </a>
                <?php } ?>
              </div>
              <hr>
              <div class="card-body bg-dark text-light">
                <u><strong>Statistik</strong></u>
                <table style="font-size: 12px">
                  <tbody>
                    <tr>
                      <td>Jumlah Lowongan</td>
                      <td>:</td>
                      <td> <?php echo $this->db->count_all('lowongan');?></td>
                    </tr>
                    <tr>
                      <td> Perusahaan Terdaftar</td>
                      <td>:</td>
                      <td> <?php echo $this->db->count_all('perusahaan');?></td>
                    </tr>
                    <tr>
                      <td>Pencaker Terdaftar</td>
                      <td>:</td>
                      <td> <?php echo $this->db->count_all('pencaker');?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <hr>
               <div class="card-body bg-dark text-light">
                <strong>Top Company</strong><br><br>
                <table style="font-size: 12px" class="table table-sm">
                  <tbody>
                    <?php foreach ($topcomp as $a) {  ?>
                    <tr>
                      <td><?=$a->NAMA_PERUSAHAAN; ?></td>
                      <td>:</td>
                      <td><?=$a->jumlah;?> <span> lowongan diterima</span></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <hr>
              <div class="card-body bg-dark text-light wsembunyi">
                <u><strong>Lowongan Per Tingkat Pendidikan</strong></u>
                <table style="font-size: 12px">
                  <tbody>
                    <tr>
                      <td>Non Pendidikan</td>
                      <td>:</td>
                      <td>
                        <?php if($null[0]->total==''){echo "0";}else{ echo $null[0]->total;}; ?>
                        <span>Kuota</span>
                      </td>
                    </tr>
                    <tr>
                      <td>SMP/ MTS</td>
                      <td>:</td>
                      <td>
                        <?php if($smp[0]->total==''){echo "0";}else{ echo $smp[0]->total;}; ?>
                        <span>Kuota</span>    
                      </td>
                    </tr>
                    <tr>
                      <td>SMA/ SMK</td>
                      <td>:</td>
                      <td>
                        <?php if($sma[0]->total==''){echo "0";}else{ echo $sma[0]->total;}; ?>
                        <span>Kuota</span>    
                      </td>
                    </tr>
                    <tr>
                      <td>D3/ S1</td>
                      <td>:</td>
                      <td> 
                        <?php if($sarjana[0]->total==''){echo "0";}else{ echo $sarjana[0]->total;}; ?>
                        <span>Kuota</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>     
		
	<?php echo $footer; ?>
	
	<?php
		echo __js('jquery'); 
		echo __js('popper');
		echo __js('bootstrap');
	 ?>

   <script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '1')
 {
  $.ajax({
   url:"<?php echo base_url();?>/pencaker/get_notification/",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('#dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $(document).on('click', '.dropdown-klik', function(){
  $('.count').html('');
  load_unseen_notification(view = '2');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);

 $(".bt").click(function(){
    load_unseen_notification();
});
 
});
</script>
</body>
</html>