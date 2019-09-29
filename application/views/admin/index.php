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
    
        foreach($data as $data){
            $TGL_MULAI[]  = mediumdate_indo($data->TGL_MULAI);
            $total[]      = (float) $data->total;
        }
        foreach($datapenc as $p){
            $pen_created[]  = mediumdate_indo($p->DIBUAT_PADA);
            $totalpenc[]    = (float) $p->totalpenc;
        }
        foreach($dataper as $c){
            $per_created[]  = mediumdate_indo($c->DIBUAT_PADA);
            $totalper[]     = (float) $c->totalper;
        }

        foreach ($null as $n){ $pend1[] = (float) $n->total; }
        foreach ($smp as $mp){ $pend2[] = (float) $mp->total; }
        foreach ($sma as $ma){ $pend3[] = (float) $ma->total; }
        foreach ($sarjana as $s){ $pend4[] = (float) $s->total; }

        foreach ($topcomp as $t){ 
          $compName[] = ($t->NAMA_PERUSAHAAN);
          $comp[]     = (float) $t->jumlah; 
        }
     ?>
</head>

<body>
    <div class="page-wrapper chiller-theme sidebar-bg bg2 toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fa fa-bars"></i>
        </a>
        
        <?php echo $sidebar; ?>

        <main class="page-content">
            <div class="container-fluid">
              <div class="alert-warning" style="padding-left: 7px; border-left: 5px solid; box-shadow: 0 5px 5px -2px grey">
                <h2>Selamat Datang</h2>
                  <p>Hai <b><?php echo $this->session->userdata('__ci_admin_nama'); ?></b>, Selamat datang dihalaman administrator. <br> 
                    Silahkan klik menu pilihan pada sidebar sebelah kiri untuk mengelola konten website <b>Sistem Informasi Bursa Kerja.</b>
                  </p>
              </div>
                <ol class="breadcrumb">
                    <h6 class="breadcrumb-item">
                      <i class="fa fa-home"></i> Beranda
                    </h6>
                </ol>

              <!-- Icon Cards-->
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                              <div class="card-body-icon">
                                <i class="fa fa-user"></i>
                              </div>
                              <h1 class="mr-5"><b><?php echo $this->db->count_all('admin'); ?></b> </h1>
                              <p class="card-text">Admin</p>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="<?=base_url()?>admin/admin">
                              <span class="float-left">Lihat Detail</span>
                              <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                              </span>
                            </a>
                         </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                              <div class="card-body-icon">
                                <i class="fa fa-users"></i>
                              </div>
                              <h1 class="mr-5"><b><?php echo $this->db->count_all('pencaker'); ?></b> </h1>
                              <p class="card-text">Pencaker</p>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="<?=base_url()?>admin/pencaker">
                              <span class="float-left">Lihat Detail</span>
                              <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                              </span>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-6 col-sm-6 mb-3">
                        <div class="card text-info text-center bg-light o-hidden h-100">
                            <div class="card-body">
                              <div class="card-body-icon">
                                <i class="fa fa-check"></i>
                              </div>
                              <h1 style="font-size: 72px;"><b><?php echo $this->db->count_all('sudah_bekerja'); ?></b> </h1>
                               <h5 class="card-text">Sudah Bekerja</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                   <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                              <div class="card-body-icon">
                                <i class="fa fa-building"></i>
                              </div>
                              <h1 class="mr-5"><b><?php echo $this->db->count_all('perusahaan'); ?></b> </h1>
                              <p class="card-text">Perusahaan</p>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="<?=base_url()?>admin/perusahaan">
                              <span class="float-left">Lihat Detail</span>
                              <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                              </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                              <div class="card-body-icon">
                                <i class="fa fa-bell"></i>
                              </div>
                              <h1 class="mr-5 count badge-danger"></h1>
                               <p class="card-text">Notifikasi</p>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="<?=base_url()?>admin/addLowongan">
                              <span class="float-left">Lihat Detail</span>
                              <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                              </span>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-secondary o-hidden h-100">
                            <div class="card-body">
                              <div class="card-body-icon">
                                <i class="fa fa-th-large"></i>
                              </div>
                              <h1 class="mr-5"><b><?php echo $this->db->count_all('kategori'); ?></b> </h1>
                               <p class="card-text">Kategori</p>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="<?=base_url()?>admin/kategori">
                              <span class="float-left">Lihat Detail</span>
                              <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                              </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-secondary o-hidden h-100">
                            <div class="card-body">
                              <div class="card-body-icon">
                                <i class="fa fa-suitcase"></i>
                              </div>
                              <h1 class="mr-5"><b><?php echo $this->db->count_all('lowongan'); ?></b> </h1>
                               <p class="card-text">Lowongan</p>
                            </div>
                            <a class="card-footer clearfix small z-1" href="<?=base_url()?>admin/pekerjaan">
                              <span class="float-left">Lihat Detail</span>
                              <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                              </span>
                            </a>
                        </div>
                    </div>  
                    
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-success">
                      <i class="fas fa-chart-area"></i>
                      <strong class="text-light">Top Company (Paling Sering Menerima Lowongan)</strong>
                       <a class="btn btn-danger float-right btn-sm btnmob" href="<?=base_url();?>admin/cetakTopcomp">
                         <i class="fa fa-print"></i> cetak pdf 
                       </a>
                    </div>
                    <div class="card-body">
                      <canvas id="grafikTopcomp" width="100%" height="30"></canvas>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-info">
                      <i class="fas fa-chart-area"></i>
                      <strong class="text-light">Grafik Lowongan Berdasarkan Tingkat Pendidikan</strong>
                       <a class="btn btn-danger float-right btn-sm btnmob" href="<?php echo site_url('admin/cetakLowonganpend')?>">
                         <i class="fa fa-print"></i> cetak pdf 
                       </a>
                    </div>
                    <div class="card-body">
                      <canvas id="grafikPend" width="100%" height="30"></canvas>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header bg-info">
                      <i class="fas fa-chart-area"></i>
                      <strong class="text-light">Grafik Jumlah Lowongan Dibagikan</strong>
                       <a class="btn btn-danger float-right btn-sm btnmob" href="<?php echo site_url('admin/cetakLowongan')?>">
                         <i class="fa fa-print"></i> cetak pdf 
                       </a>
                    </div>
                    <div class="card-body">
                      <canvas id="grafiklowongan" width="100%" height="30"></canvas>
                    </div>
                </div>

                
                <div class="card mb-3">
                    <div class="card-header bg-warning">
                      <i class="fas fa-chart-area"></i>
                      <strong class="text-light">Grafik Jumlah Pencaker Terdaftar</strong>
                      <a class="btn btn-danger float-right btn-sm btnmob" href="<?php echo site_url('admin/cetakPencaker')?>">
                         <i class="fa fa-print"></i> cetak pdf 
                      </a>
                    </div>
                    <div class="card-body">
                      <canvas id="grafikpencaker" width="100%" height="30"></canvas>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-success">
                      <i class="fas fa-chart-area"></i>
                      <strong class="text-light">Grafik Jumlah Perusahaan Terdaftar</strong>
                      <a class="btn btn-danger float-right btn-sm btnmob" href="<?php echo site_url('admin/cetakPerusahaan')?>">
                         <i class="fa fa-print"></i> cetak pdf 
                      </a>
                    </div>
                    <div class="card-body">
                      <canvas id="grafikcompany" width="100%" height="30"></canvas>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- page-wrapper -->
    <?php
        echo __js('chart'); 
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
    <script>
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = '#292b2c';

      // lowongan pend
      var ctx = document.getElementById("grafikPend");
      var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Non Pendidikan", "SMP/MTS", "SMA/SMK", "D3/S1/S2"],
          datasets: [
          {
            label: "Jumlah Lowongan",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data : [<?php echo json_encode($pend1);?>, 
                    <?php echo json_encode($pend2);?>, 
                    <?php echo json_encode($pend3);?>, 
                    <?php echo json_encode($pend4);?>],
          }

          ],
        },
        options: {
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                min: 0,
                max: 500,
                maxTicksLimit: 5
              },
              gridLines: {
                color: "rgba(0, 0, 0, .125)",
              }
            }],
          },
          legend: {
            display: false
          }
        }
      });

      // lowongan
      var ctx = document.getElementById("grafiklowongan");
      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels : <?php echo json_encode ($TGL_MULAI);?>,
          datasets: [{
            label: "Jumlah Lowongan",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.3)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data : <?php echo json_encode($total);?>,
          }],
        },
        options: {
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                min: 0,
                max: 30,
                maxTicksLimit: 10
              },
              gridLines: {
                color: "rgba(0, 0, 0, .125)",
              }
            }],
          },
          legend: {
            display: false
          }
        }
      });

      // pencaker
      var ctx = document.getElementById("grafikpencaker");
      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels : <?php echo json_encode ($pen_created);?>,
          datasets: [{
            label: "Jumlah Pencaker",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.3)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data : <?php echo json_encode($totalpenc);?>,
            labels : <?php echo json_encode ($per_created);?>,
          }],
        },
        options: {
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                min: 0,
                max: 30,
                maxTicksLimit: 10
              },
              gridLines: {
                color: "rgba(0, 0, 0, .125)",
              }
            }],
          },
          legend: {
            display: false
          }
        }
      });

      // company
      var ctx = document.getElementById("grafikcompany");
      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels : <?php echo json_encode ($per_created);?>,
          datasets: [{
            label: "Jumlah Perusahaan",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.3)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data : <?php echo json_encode($totalper);?>,
          }],
        },
        options: {
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                min: 0,
                max: 30,
                maxTicksLimit: 10
              },
              gridLines: {
                color: "rgba(0, 0, 0, .125)",
              }
            }],
          },
          legend: {
            display: false
          }
        }
      });

       // topCompany
      var ctx = document.getElementById("grafikTopcomp");
      var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels : <?php echo json_encode ($compName);?>,
          datasets: [{
            label: "Jumlah Lowongan Diterima",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data : <?php echo json_encode($comp);?>,
          }],
        },
        options: {
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                min: 0,
                max: 30,
                maxTicksLimit: 15
              },
              gridLines: {
                color: "rgba(0, 0, 0, .125)",
              }
            }],
          },
          legend: {
            display: false
          }
        }
      });

    </script>
</body>

</html>