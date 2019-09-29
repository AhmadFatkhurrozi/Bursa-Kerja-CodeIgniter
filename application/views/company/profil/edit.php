<style>
  .form-group{
    font-size: 14px;
  }
</style>
<div>
  <h4><i class="fa fa-building"></i><span> Edit Profil</span></h4>
</div>

  <hr>
  
<div class="row">
  <?php foreach( $query_profil->result() as $a ){ ?>
  <div class="col-md-4 text-center"><br>
    <img alt="User Picture" src="<?=base_url()?>dist/img/company/<?=$a->LOGO_PERUSAHAAN;?>" width="150" class="img-circle img-responsive" style="border-radius: 50%;">
  </div>
  <?php } ?>

  <div class="col-md-8" style="margin-top: 50px;"><br>
    <?php echo form_open_multipart('company/uploadProfil'); ?>
      <fieldset class="form-group">
        <input type="file" class="form-control-file" name="foto">
      </fieldset>
      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Upload</button>
    </form>
  </div>

  <div class="col-md-12"><br>
    <?php foreach( $query_profil->result() as $a ){ ?>
    <?php echo form_open_multipart('company/ubahProfil'); ?>
      <fieldset class="form-group">
        <label>Nama Perusahaan</label>
        <input type="text" class="form-control" name="namacomp" value="<?=$a->NAMA_PERUSAHAAN;?>">
      </fieldset>
      <fieldset class="form-group">
        <label>Bidang Usaha</label>
        <input type="text" class="form-control" name="bidang" value="<?=$a->BIDANG_USAHA;?>">
      </fieldset>
      <fieldset class="form-group">
        <label>Deskripsi</label>
          <textarea name="deskripsi" class="form-control"><?=$a->DESKRIPSI_PERUSAHAAN;?></textarea>   
      </fieldset>
      <fieldset class="form-group">
        <label>Slogan</label>
        <input type="text" class="form-control" name="slogan" value="<?=$a->SLOGAN;?>">
      </fieldset>
      <fieldset class="form-group">
        <label>No SIUP (Surat Izin Usaha Perdagangan)</label>
        <input type="text" class="form-control" name="siup" value="<?=$a->NO_SIUP;?>">
      </fieldset>
      <fieldset class="form-group">
        <label>No SITU (Surat Izin Tempat Usaha)</label>
        <input type="text" class="form-control" name="situ" value="<?=$a->NO_SITU;?>">
      </fieldset>
      <fieldset class="form-group">
        <label>Email</label>
          <input type="email" class="form-control" name="email" value="<?=$a->EMAIL; ?>">     
      </fieldset>
      <fieldset class="form-group">
        <label>Telepon</label>
          <input type="text" class="form-control" name="telepon" value="<?=$a->TELEPON; ?>">     
      </fieldset>
      <fieldset class="form-group">
        <label>Website</label>
          <input type="text" class="form-control" name="web" value="<?=$a->WEBSITE; ?>">     
      </fieldset>
      <fieldset class="form-group">
        <label>Alamat</label>
          <textarea name="alamat" class="form-control"><?=$a->ALAMAT; ?></textarea>   
      </fieldset>
      <fieldset class="form-group">
        <label>Lokasi</label>
          <input name="long" value="<?=$a->LONG_KOORDINAT;?>" readonly="">
          <input name="lat" value="<?=$a->LAT_KOORDINAT;?>" readonly="">  
          <a href="<?=base_url()?>company/maps" class="btn btn-secondary btn-sm">Edit Lokasi</a> 
      </fieldset>
      <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Perbarui</button>
      <a href="<?php echo base_url();?>company/profil" class="btn btn-light btn-sm">Kembali</a>
    </form>
    <?php } ?>
  </div>
</div>

