<nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
    <a class="navbar-brand" href="<?=base_url()?>">
        <img src="<?= base_url() ?>dist/img/logo.png" class="img-fluid" style="height: 40px;">
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        
    <div class="navbar-collapse collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="<?=base_url()?>" class="btn btn-info"><i class="fa fa-home"></i> Beranda</a>
            </li>
        </ul>        
        <ul class="navbar-nav">
            <li class="nav-item text-warning" style="margin-top: 6px; padding-right: 5px;">
                <span>Buat Akun ?</span>
            </li>
            <li class="nav-item" style="padding-right: 5px;">
                 <a class="btnm" href="<?=base_url()?>akun/reg_pencaker" style="color: white;">
                    <i class="fa fa-user bg-secondary" style="padding: 10px; border-radius: 50%;"></i> Pencaker
                </a>
            </li>
             <li class="nav-item">
                <a href="<?=base_url()?>akun/reg_comp" style="color: white;">
                    <i class="fa fa-building bg-secondary" style="padding: 10px; border-radius: 50%;"></i> Perusahaan
                </a>
            </li>
        </ul>                    
    </div>
</nav>



