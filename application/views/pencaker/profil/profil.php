<?php error_reporting(0); ?>
<div>
  <h4 class="home-title"><i class="fa fa-user"></i><span> My Profile</span></h4>
</div>

<hr>

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<br>

<div class="row alert alert-dark">
  <?php foreach( $query_pencaker->result() as $a ){ ?>
  <div class="col-md-4"  align="center">
    <a href="#gambar" class="btn-gbr" data-toggle="modal" data-gambar="<?=base_url()?>dist/img/pencaker/<?=$a->FOTO;?>">
       <img src="<?=base_url()?>dist/img/pencaker/<?=$a->FOTO;?>" width="200">
    </a>
  </div>

  <div class="col-md-8 alert alert-info"> 
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
        <tr>
          <td><b>Foto KTP</b></td>
          <td>
            <a href="#gambar" class="btn-gbr img-thumbnail" data-toggle="modal" data-gambar="<?=base_url()?>dist/img/pencaker/ktp/<?=$a->FOTO_KTP;?>">
               <img class="btn-gbr" src="<?=base_url()?>dist/img/pencaker/ktp/<?=$a->FOTO_KTP;?>">
            </a>
        </tr>
      </tbody>
    </table>
  <?php } ?>
    <a href="<?=base_url()?>pencaker/editProfil" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit Profil</a>
  </div>
</div>

<div class="modal fade" id="gambar">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Preview</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
          </div>
          <div class="modal-body">
            <img id="detail" height="100%" width="100%">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">tutup</button>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
    $('.btn-gbr').on('click', function () {
      $('#detail').attr('src', $(this).data('gambar'));
    })
</script>