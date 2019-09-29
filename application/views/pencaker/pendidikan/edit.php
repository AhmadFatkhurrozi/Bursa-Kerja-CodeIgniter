<div>
	<h4><i class="fa fa-user"></i><span>Edit Pendidikan</span></h4>
</div>

 <hr>

<div class="row">
  <div class="col-md-12"><br>
  	<?php foreach($query_pendidikan as $a){ ?> 
  	<form action="<?php echo base_url();?>pencaker/ubahPend" method="post">
  		<fieldset class="form-group">
        	<input type="hidden" class="form-control" name="id_pendidikan" value="<?php echo $a->ID_PENDIDIKAN; ?>">
      	</fieldset>
  		<fieldset class="form-group">
            <label>Tingkat Pendidikan</label>
            <select class="form-control" name="tingkat">
              <option value="<?php echo $a->TINGKAT_PENDIDIKAN; ?>"><?php echo $a->TINGKAT_PENDIDIKAN; ?></option>
              <option value="SD/MI">SD</option>
              <option value="SMP/MTS">SMP</option>
              <option value="SMA/SMK">SMA</option>
              <option value="D3/Ahli Madya">D3</option>
              <option value="S1/Sarjana">S1</option>
              <option value="S2/Magister">S2</option>
              <option value="S3/Doktor">S3</option>
        	</select>
        </fieldset>
  		<fieldset class="form-group">
        	<label>Nama Sekolah</label>
        	<input type="text" class="form-control" name="namasekolah" value="<?php echo $a->NAMA_SEKOLAH; ?>">
      	</fieldset>
      	<fieldset class="form-group">
        	<label>Jurusan</label>
        	<input type="text" class="form-control" name="jurusan" value="<?php echo $a->JURUSAN;?>">
      	</fieldset>
      	<fieldset class="form-group">
            <label>Alamat</label>
              <textarea name="alamat" class="form-control"><?php echo $a->ALAMAT_SEKOLAH;?></textarea>   
        </fieldset>
        <fieldset class="form-group">
        	<label>Tahun Masuk</label>
        	<input type="text" class="form-control" name="masuk" value="<?php echo $a->TAHUN_MASUK; ?>">
      	</fieldset>
      	<fieldset class="form-group">
        	<label>Tahun Lulus</label>
        	<input type="text" class="form-control" name="keluar" value="<?php echo $a->TAHUN_LULUS;?>">
      	</fieldset>
      <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Perbarui</button>
  	</form>
  	<br>
  	<?php echo form_open_multipart('pencaker/uploadPend/'.$a->ID_PENDIDIKAN); ?>
  		<fieldset class="form-group">
        	<label>Lampiran (ijazah jpg/png)</label>
        	<input type="file" class="form-control-file" name="foto">
        	<i>Gambar/Pdf Ukuran Maks 2Mb</i>
      	</fieldset>
      	<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
      	<button type="submit" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Upload</button>
        <a href="<?php echo base_url();?>pencaker/pendidikan" class="btn btn-light btn-sm">Kembali</a>
  	</form>
  <?php } ?>
  </div>
</div>