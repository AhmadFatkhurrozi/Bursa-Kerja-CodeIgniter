<ol class="breadcrumb">
    <h6 class="breadcrumb-item">
      <i class="fa fa-home"></i>
      <a href="<?=base_url()?>admin">Dashboard</a>
    </h6>
    <h6 class="breadcrumb-item">
      <a href="<?=base_url()?>admin/pencaker">Data Pencaker</a>
    </h6>
    <h6 class="breadcrumb-item active"> Detail Pencaker</h6>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <h5>
      <i class="fa fa-user"></i>
      <span>Detail Pencaker</span>
    </h5>
  </div>
  <form>
  <div class="card-body">

<div class="row">
  <?php foreach( $query_pencaker->result() as $a ){ ?>
  <div class="col-md-3"  align="center">
    <img src="<?=base_url()?>dist/img/pencaker/<?=$a->FOTO;?>" width="200" class="img-fluid"><br>
    <i>Pas Foto</i>
    <hr>
    <img src="<?=base_url()?>dist/img/pencaker/ktp/<?=$a->FOTO_KTP;?>" width="200" class="img-fluid"><br>
    <i>Foto Ktp</i>
  </div>

  <div class=" col-md-6"> 
    <table class="table table-user-information">
      <tbody>
        <tr>
          <td><b>NIK</b></td>
          <td><?=$a->NIK;?></td>
        </tr>
        <tr>
          <td><b>Nama</b></td>
          <td><?=$a->NAMA_PENCAKER;?></td>
        </tr>
        <tr>
          <td><b>Jenis Kelamin</b></td>
          <td><?=$a->JK;?></td>
        </tr>
        <tr>
          <td><b>Tempat <br>Tanggal Lahir</b></td>
          <td><?=$a->TEMPAT_LAHIR;?><br>
              <?=mediumdate_indo($a->TGL_LAHIR);?>
          </td>
        </tr>
         <tr>
          <td><b>Status</b></td>
          <td><?=$a->STATUS_KAWIN;?></td>
        </tr>
        <tr>
          <td><b>Agama</b></td>
          <td><?=$a->AGAMA;?></td>
        </tr>
        <tr>
          <td><b>Email</b></td>
          <td><?=$a->EMAIL;?></td>
        </tr>
        <tr>
          <td><b>Telepon</b></td>
          <td><?=$a->TELEPON;?></td>
        </tr>
        <tr>
          <td><b>Alamat</b></td>
          <td><?=$a->ALAMAT;?></td>
        </tr>
      </tbody>
    </table>
  <?php } ?>
  </div>
</div>