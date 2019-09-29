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
      }}
      @media (max-width: 480px){
        .btnmob {
          width: 100%;
          margin-bottom: 10px;
      }}
       table{
          font-size: 14px;
      }
      .no{
          text-align: center;
      }
      thead{
          text-align: center;
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
         ?>
        <main class="page-content">
            <div class="container-fluid">

        <?php 
            echo $lihat;
         ?>
        </main>
    </div>
  <?php
        echo __js('popper');
        echo __js('bootstrap');
        echo __js('custom');
        echo __js('checkall');
        echo __js('_checkall');
     ?>
  <script src="./dist/js/chart.min.js"></script>
</body>

</html>