<div>
  <div>
    <h4>
      <i class="fa fa-user"></i>
      <span>My Profile</span>
    </h4>
  </div>
  <hr>
  <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
  <br>
  <div class="row">
    <?php foreach( $query_admin->result() as $a ){ ?>
      <div class="col-md-3" align="center">
        <img src="<?=base_url()?>dist/img/admin/<?=$a->FOTO_ADMIN;?>" width="200" class="img-fluid">
      </div>

      <div class=" col-md-9"> 
          <table class="table table-user-information">
            <tbody>
              <tr>
                <td><b>Nama</b></td>
                <td><?=$a->NAMA_ADMIN?></td>
              </tr>
              <tr>
                <td><b>Telepon</b></td>
                <td><?=$a->TELEPON;?></td>
              </tr>
              <tr>
                <td><b>Email</b></td>
                <td><?=$a->EMAIL;?></td>
              </tr>
            </tbody>
          </table>
          <a href="<?=base_url()?>admin/editProfil" class="btn btn-success btn-sm">
            <i class="fa fa-edit"></i> Edit Profil
          </a>
      </div>
    <?php } ?>
  </div>
</div>