<div>
  <h5><i class="fa fa-user"></i><span> Edit Profil</span></h5>
</div>

<hr>

<div class="row">
  <?php foreach($query_admin->result() as $a){ ?> 
  <div class="col-md-4 text-center"><br>
    <img src="<?=base_url()?>dist/img/admin/<?=$a->FOTO_ADMIN;?>" width="200" class="img-fluid">
  </div>
  <?php } ?>

  <div class="col-md-8" style="margin-top: 50px;"><br>
    <?php echo form_open_multipart('admin/uploadProfil'); ?>
      <fieldset class="form-group">
        <input type="file" class="form-control-file btn-sm" name="foto">
        <small style="margin-left: 7px;">Maks. 2Mb</small>
      </fieldset>
      <button style="margin-left: 7px;" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Upload</button>
    </form>
    <hr>
  </div>

  <div class="col-md-12"><br>
    <?php foreach($query_admin->result() as $a){ ?> 
    <?php echo form_open_multipart('admin/ubahProfil'); ?>
      <fieldset class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $a->NAMA_ADMIN; ?>">
      </fieldset>
      <fieldset class="form-group">
        <label>Nomor HP</label>
          <input type="text" class="form-control" name="telepon" value="<?php echo $a->TELEPON; ?>">     
      </fieldset>
      <fieldset class="form-group">
        <label>Email</label>
          <input type="email" class="form-control" name="email" value="<?php echo $a->EMAIL; ?>">     
      </fieldset>
      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> Perbarui</button>
      <a href="<?php echo base_url();?>admin/profil" class="btn btn-light btn-sm">Kembali</a>
    </form>
    <?php } ?>
  </div>
</div>