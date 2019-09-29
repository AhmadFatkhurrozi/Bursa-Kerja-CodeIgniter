<nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">



    <a class="navbar-brand" href="<?=base_url()?>pencaker"><img height="40" src="<?= base_url() ?>dist/img/logo.png" class="img-responsive"></a>

    

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        

    <div class="navbar-collapse collapse" id="navbarCollapse">

        <ul class="navbar-nav mr-auto">

            <li>

                <a href="<?=base_url()?>pencaker" class="btn btn-info"><i class="fa fa-home"></i> Beranda</a>

            </li>

            <li>

                <div class="dropdown">

                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">

                     <i class="fa fa-suitcase"></i> Cari Kerja

                    </button>

                    <div class="dropdown-menu">

                        <?php foreach ($all as $c) { ?>

                        <a href="<?=base_url()?>pencaker/lowongan" class="dropdown-item">

                          Semua (<?=$c->total;?>)

                        </a>

                        <?php } ?>



                        <?php foreach ($query_kategori as $a) { ?>

                        <a href="<?php echo site_url('pencaker/lowonganKat/').$a->ID_KATEGORI; ?>" class="dropdown-item">

                            <?php echo $a->NAMA_KATEGORI; ?>(<?php echo $a->total ?>)

                        </a>

                        <?php } ?>

                    </div>

                </div>

            </li>

            <li class="dropdown">

                <a href="<?=base_url('pencaker/review')?>" class="btn btn-info dropdown-klik">

                     <i class="fa fa-bell"></i>  Hasil Review 

                     <span class="badge badge-danger count"></span>

                </a>

            </li>

        </ul>

            

        <ul class="navbar-nav">

            <li class="text-light">

                <a class="btn btn-outline-danger-sm text-light" href="<?=base_url()?>pencaker/profil">

                    <i class="fa fa-user"></i>

                    <?php if ( !$this->session->userdata("__ci_pencaker_nama")) { ?>
                      Guest
                    <?php } else { ?>

                    <?php echo $this->session->userdata("__ci_pencaker_nama"); ?>

                </a>

            </li>

            <li>

                <a class="btn btn-outline-danger-sm text-light" href="<?php echo base_url('akun/logout'); ?>" onclick="return confirm('Keluar ?')"> 

                    <i class="fa fa-sign-out"></i> Keluar
                  <?php } ?>
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