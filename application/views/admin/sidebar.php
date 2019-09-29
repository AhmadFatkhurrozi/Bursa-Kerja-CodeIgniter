<nav id="sidebar" class="sidebar-wrapper">        

    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="<?=base_url()?>admin">ADMIN SI BURSA KERJA</a>

            <div id="close-sidebar">
                <i class="fa fa-times"></i>
            </div>
        </div>
        <div class="sidebar-header">
            <div class="user-pic">
                <a href="<?=base_url();?>admin/profil">
                    <img class="img-responsive img-rounded" src="<?=base_url()?>dist/img/admin/<?=$this->session->userdata("__ci_admin_foto");  ?>">
                </a>
            </div>
            <div class="user-info">
                <span class="user-name">
                    <strong>
                        <a href="<?=base_url();?>admin/profil" style="text-decoration: none;" class="text-light">
                            <?php echo $this->session->userdata("__ci_admin_nama"); ?>
                        </a>
                    </strong>
                </span>
                <span class="user-role">Administrator</span>
                <span class="user-status">
                    <i class="fa fa-circle"></i>
                    <span>Online</span>
                </span>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="<?=base_url()?>admin">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="<?=base_url()?>admin/pengangguran">
                        <i class="fa fa-calculator"></i>
                        <span>Data Pengangguran</span>
                    </a>
                </li> -->
                <li>
                    <a href="<?=base_url()?>admin/addLowongan">
                        <i class="fa fa-bell"></i>
                        <span>Pemberitahuan</span>
                        <span class="badge badge-pill badge-danger count"></span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>admin/pekerjaan">
                        <i class="fa fa-suitcase"></i>
                        <span>Data Lowongan</span>
                    </a>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-folder"></i>
                        <span>Manage Kategori</span>
                    </a>
                    <div class="sidebar-submenu ">
                        <ul>
                            <li>
                                <a href="<?=base_url()?>admin/kategori">Data Kategori</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>admin/tambahKategori">Tambah Data</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Manage Akun</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="<?=base_url()?>admin/admin">Data Admin</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>admin/pencaker">Data Pencaker</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>admin/perusahaan">Data Perusahaan</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                         <i class="fa fa-cog"></i>
                         <span>Setting</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="<?=base_url();?>admin/profil">My Profile</a>
                            </li>
                            <!-- <li>
                                <a href="<?=base_url()?>admin/tema">Tema</a>
                            </li> -->
                            <li>
                                <a href="#">Help</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <div>
            <a href="<?php echo base_url('admin/logout'); ?>" onclick="return confirm('Keluar ?')">
                <i class="fa fa-power-off"> Log out</i>
            </a>
        </div>
    </div>
</nav>



<script>
      $(document).ready(function(){
       
       function load_unseen_notification(view = '1')
       {
        $.ajax({
         url:"<?php echo base_url();?>admin/notifLowongan/",
         method:"POST",
         data:{view:view},
         dataType:"json",
         success:function(data)
         {
          $('#lowongan').html(data.notification);
          if(data.unseen_notification > 0)
          {
           $('.count').html(data.unseen_notification);
          }
         }
        });
       }
       
       load_unseen_notification();
       
       $(document).on('click', '.dropdown-lowongan', function(){
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