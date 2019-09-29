  <div>
    <h4><i class="fa fa-building"></i><span> Company Profile</span></h4>
  </div>

  <hr><br>
  
  <div class="row">
    <?php foreach( $query_profil->result() as $a ){ ?>
    <div class="col-md-4"  align="center">
      <img alt="User Picture" src="<?=base_url()?>dist/img/company/<?=$a->LOGO_PERUSAHAAN;?>" width="200" height="200" class="img-circle img-responsive">
    </div>
  
    <div class=" col-md-8"> 
      <table class="table table-user-information">
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
    </div>
  </div>
