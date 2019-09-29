
<nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
    <a class="navbar-brand" href="<?=base_url()?>company"><img height="50px" src="<?= base_url() ?>dist/img/logo.png" class="img-responsive"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
    <div class="navbar-collapse collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li>
                <a href="<?=base_url()?>company" class="btn btn-info"><i class="fa fa-home"></i> Beranda</a>
            </li>
            <li>
                <a href="<?=base_url()?>company/lowongan" class="btn btn-info"><i class="fa fa-suitcase"></i> Cari Pekerja</a>
            </li>
            <li class="dropdown">
                <a href="<?=base_url('company/bid')?>" class="btn btn-info dropdown-bid">
                     <i class="fa fa-envelope"></i> Lamaran Masuk 
                     <span class="badge badge-danger countbid"></span>
                </a>
            </li>
        </ul>

            
        <ul class="navbar-nav">
            <li class="text-light">
                <a class="btn btn-outline-danger-sm text-light" href="<?=base_url()?>company/profil"> 
                    <i class="fa fa-building"></i>
                    <?php echo $this->session->userdata("__ci_perusahaan_nama"); ?>
                </a>
            </li>
            <li>
                <a class="btn btn-outline-danger-sm text-light" href="<?php echo base_url('akun/logout'); ?>" onclick="return confirm('Keluar ?')"> 
                    <i class="fa fa-sign-out"></i> Keluar
                </a>
            </li>
        </ul>        
                 
    </div>
</nav>

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