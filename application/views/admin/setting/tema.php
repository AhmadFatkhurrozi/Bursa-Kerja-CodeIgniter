<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./dist/img/icon.png">
    <title>Admin Sistem Informasi Bursa Kerja</title>

    <style type="text/css">
      @media(max-width: 875px){
      .btnm {
        display: none;
      }
       table{
          font-size: 14px;
      }
      .no{
          text-align: center;
      }
      thead{
          text-align: center;
      }
      .btn-gbr{
            height: 30px;
          }
    </style>

    <?php 
        echo __css('bootstrap');
        echo __css('fontawesome');
        echo __css('admin');
        echo __css('custom');
        echo __css('custom-themes');
        echo __js('jquery');
     ?>

</head>

<body>
    <div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fa fa-bars"></i>
        </a>
        
        <?php 
            echo $sidebar;
            echo $tema;
         ?>
        
    </div>
   
  <?php
        echo __js('popper');
        echo __js('bootstrap');
        echo __js('custom');
     ?>

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
</body>

</html>