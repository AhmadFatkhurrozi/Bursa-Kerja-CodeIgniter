<div>
  <h4><i class="fa fa-building"></i><span> Company Profile</span></h4>
</div>

<hr>

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div><br>

<div class="row alert alert-warning" style="border-left: 3px solid">
  <?php foreach( $query_profil->result() as $a ){ ?>
  <div class="col-md-2 text-center">
    <img alt="User Picture" src="<?=base_url()?>dist/img/company/<?=$a->LOGO_PERUSAHAAN;?>" width="110" class="img-circle img-responsive">
  </div>

  <div class=" col-md-10"> 
    <table class="table table-info text-dark alert alert-info">
      <tbody>
      	<tr>
          <td><b>Nama Perusahaan</b></td>
          <td><?=$a->NAMA_PERUSAHAAN;?></td>
        </tr>
        <tr>
          <td><b>Bidang Usaha</b></td>
          <td><?=$a->BIDANG_USAHA;?></td>
        </tr>
        <tr>
          <td><b>Deskripsi Perusahaan</b></td>
          <td><?=$a->DESKRIPSI_PERUSAHAAN;?></td>
        </tr>
        <tr>
          <td><b>Slogan</b></td>
          <td><?=$a->SLOGAN;?></td>
        </tr>
        <tr>
          <td><b>NO. SIUP (Surat Izin Usaha Perdagangan)</b></td>
          <td><?=$a->NO_SIUP;?></td>
        </tr>
        <tr>
          <td><b>NO. SITU (Surat Izin Tempat Usaha)</b></td>
          <td><?=$a->NO_SITU;?></td>
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
          <td><b>Website</b></td>
          <td><?=$a->WEBSITE;?></td>
        </tr>
        <tr>
          <td><b>Alamat</b></td>
          <td><?=$a->ALAMAT;?></td>
        </tr>
      </tbody>
    </table>
  <?php } ?>
    <a href="<?=base_url()?>company/editProfil" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit Profil</a>
  </div>
</div>