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
<div class="container features-icons" style="padding-top: 40px;">

  <div class="row">

    <div class="col-md-9 alert-dark">
      <?php echo $slider; ?>
      <div class="jumbotron text-center">
        <h2>Sistem Informasi Bursa Kerja</h2>
        <hr class="m-y-md">
        <p class="lead">Temukan Tenaga Kerja anda</p>
      </div>

      <br>

      <div class="card-body">
        <div class="row text-center alert-secondary" style="padding: 10px 0px; border: 1px solid">
          <div class="col-md-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-screen-desktop m-auto text-primary"></i>
              </div>
              <strong><i class="fa fa-share"></i> Share Lowongan</strong>
              <p><br>Bagikan Lowongan dalam Sistem</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"></i>
              </div>
              <strong><i class="fa fa-envelope"></i> Lamaran Masuk</strong>
              <p><br>Pencaker Mengirim Lamaran Pekerjaan</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-check m-auto text-primary"></i>
              </div>
              <strong><i class="fa fa-eye"></i> Review</strong>
              <p><br>Lakukan Review dan Buat Keputusan Terhadap Pencaker</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 sembunyi"  style="padding-top: 60px;">
          <div class="card">
            <div class="card-body bg-light">
              <center><?php echo $kalender ?></center>
            </div>
            <hr>
            <div class="card-body bg-light">
              <strong class="text-dark"><i class="fa fa-suitcase"></i> Manage Lowongan</strong>
              <div class="list-group">
                <a style="padding-top: 5px; padding-bottom: 5px;" href="<?php echo base_url()?>company/tambahLowongan" class="btn-sm list-group-item">
                    <i class="fa fa-plus"></i> Tambah Data Lowongan
                  </a>
                  <a style="padding-top: 5px; padding-bottom: 5px;" href="<?php echo base_url()?>company/lowongan" class="btn-sm list-group-item">
                    Data Lowongan
                  </a>
                  <a style="padding-top: 5px; padding-bottom: 5px;" href="<?=base_url()?>company/bid" class="btn-sm list-group-item"> 
                BID <span class="badge badge-danger countbid"></span>
              </a>
              <a style="padding-top: 5px; padding-bottom: 5px;" href="<?=base_url()?>company/review" class="btn-sm list-group-item"> 
                Review
              </a>
              </div><br>
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
            </div>
          </div>
        </div>
  </div>
</div>

  <?php echo $footer; ?>
	
	<?php
    echo __js('jquery'); 
		echo __js('bootstrap');
	 ?>
   
<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '1')
 {
  $.ajax({
   url:"<?php echo base_url();?>company/notifBid/",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('#bid').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.countbid').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $(document).on('click', '.dropdown-bid', function(){
  $('.countbid').html('');
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