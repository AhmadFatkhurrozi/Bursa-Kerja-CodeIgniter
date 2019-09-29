<div>
  <h4><i class="fa fa-user"></i><span> Edit Profil</span></h4>
</div>

<hr>

<div class="row">
  <?php foreach($query_pencaker->result() as $a){ ?> 
  <div class="col-md-4 text-center"><br>
    <img src="<?=base_url()?>dist/img/pencaker/<?=$a->FOTO;?>" width="150" height="150" class="img-circle" style="border-radius: 50%;">
  </div>
  <?php } ?>

  <div class="col-md-8 alert alert-info" style="margin-top: 30px; font-size: 14px;">
    <?php echo form_open_multipart('pencaker/uploadProfil'); ?>
      <fieldset class="form-group">
        <label class="text-success" style="border-left: 3px solid; padding-left: 5px; font-size: 18px;">Pas Foto</label>
        <input type="file" class="form-control-file" name="foto" required>
        <i>Maks. 2Mb</i>
      </fieldset>
      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Upload</button>
    </form>
  </div>

  <?php foreach($query_pencaker->result() as $a){ ?> 
  <div class="col-md-4 text-center"><br>
    <img src="<?=base_url()?>dist/img/pencaker/ktp/<?=$a->FOTO_KTP;?>" width="200" style="margin-top: 10px" class="img-thumbnail">
  </div>
  <?php } ?>

  <div class="col-md-8 alert alert-info" style="margin-top: 20px; font-size: 14px;">
    <?php echo form_open_multipart('pencaker/uploadKtp'); ?>
      <fieldset class="form-group">
        <label class="text-success" style="border-left: 3px solid; padding-left: 10px; font-size: 18px;">Foto Ktp</label>
        <input type="file" class="form-control-file" name="ktp" required>
        <i>Maks. 2Mb</i>
      </fieldset>
      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Upload</button>
    </form>
  </div>

  <div class="col-md-12" style="font-size: 14px;"><br>
    <?php foreach($query_pencaker->result() as $a){ ?> 
    <?php echo form_open_multipart('pencaker/ubahProfil'); ?>
      <fieldset class="form-group">
        <label>NIK</label>
        <input type="text" class="form-control" placeholder="Masukkan NIK" name="nik" value="<?php echo $a->NIK; ?>">
      </fieldset>
      <fieldset class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="namalengkap" value="<?php echo $a->NAMA_PENCAKER; ?>">
      </fieldset>
      <fieldset class="form-group">
          <label class="radio-inline"> Jenis Kelamin
            <input type="radio" name="jk" value="Laki-laki" <?php echo ($a->JK == 'Laki-laki')? 'checked' : '';?>> Laki-laki
            <input type="radio" name="jk" value="Perempuan"  <?php echo ($a->JK == 'Perempuan')? 'checked' : ''; ?>> Perempuan
          </label>
      </fieldset>
      <fieldset class="form-group">
        <label>Tempat Tanggal Lahir</label>
        <label class="form-inline">
          <input type="text" class="form-control" name="tempatlahir" placeholder="Masukkan Tempat Lahir" value="<?php echo $a->TEMPAT_LAHIR;?>">
          <input type="date" class="form-control" name="tgllahir" value="<?php echo $a->TGL_LAHIR;?>">
        </label>
      </fieldset>
      <fieldset class="form-group">
          <label class="radio-inline"> Status
            <input type="radio" name="status_kawin" required value="Belum Kawin" <?php echo ($a->STATUS_KAWIN == 'Belum Kawin')? 'checked' : '';?>> Belum Kawin
            <input type="radio" name="status_kawin" value="Kawin"  <?php echo ($a->STATUS_KAWIN == 'Kawin')? 'checked' : ''; ?>> Kawin
            <input type="radio" name="status_kawin" value="Cerai Hidup" <?php echo ($a->STATUS_KAWIN == 'Cerai Hidup')? 'checked' : '';?>>Cerai Hidup
            <input type="radio" name="status_kawin" value="Cerai Mati"  <?php echo ($a->STATUS_KAWIN == 'Cerai Mati')? 'checked' : ''; ?>> Cerai Mati
          </label>
      </fieldset>
      <fieldset class="form-group">
        <label>Agama</label>
        <select class="form-control" name="agama">
          <option value="<?=$a->AGAMA;?>"><?=$a->AGAMA;?></option>
          <option value="Islam">Islam</option>
          <option value="Kristen Protestan">Kristen Protestan</option>
          <option value="Katolik">Katolik</option>
          <option value="Hindu">Hindu</option>
          <option value="Budha">Budha</option>
          <option value="Kong Hu Cu">Kong Hu Cu</option>
        </select>
      </fieldset>
      <fieldset class="form-group">
        <label>Nomor HP</label>
          <input type="text" class="form-control" placeholder="Masukkan nomor HP" name="telepon" value="<?php echo $a->TELEPON; ?>">     
      </fieldset>
      <fieldset class="form-group">
        <label>Email</label>
          <input type="email" class="form-control" placeholder="Masukkan Email" name="email" value="<?php echo $a->EMAIL; ?>" readonly>     
      </fieldset>
      <fieldset class="form-group">
        <label>Alamat</label>
          <textarea name="alamat" class="form-control" placeholder="masukkan alamat lengkap"><?php echo $a->ALAMAT; ?></textarea>   
      </fieldset>
      <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Perbarui</button>
      <a href="<?php echo base_url();?>pencaker/profil" class="btn btn-light btn-sm">Kembali</a>
    </form>
    <?php } ?>
  </div>
</div>
