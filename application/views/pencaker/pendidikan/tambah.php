<div>
	<h4><i class="fa fa-user"></i><span>Tambah Riwayat Pendidikan</span></h4>
</div>

<hr>

<div class="row">
  <div class="col-md-12"><br>
  	<?php echo form_open_multipart('pencaker/tambahkanPend'); ?>
  		<fieldset class="form-group">
            <label>Tingkat Pendidikan</label>
            <select class="form-control" name="tingkat">
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
        	<input type="text" class="form-control" placeholder="Masukkan Nama Sekolah" name="namasekolah" required>
      	</fieldset>
      	<fieldset class="form-group">
        	<label>Jurusan</label>
        	<input type="text" class="form-control" placeholder="Masukkan Jurusan" name="jurusan"> 
      	</fieldset>
      	<fieldset class="form-group">
            <label>Alamat</label>
              <textarea name="alamat" class="form-control" placeholder="masukkan alamat Sekolah" required></textarea>   
        </fieldset>
        <fieldset class="form-group">
        	<label>Tahun Masuk</label>
        	<input type="text" class="form-control" placeholder="Exp. '2015'" name="masuk" required>
      	</fieldset>
      	<fieldset class="form-group">
        	<label>Tahun Lulus</label>
        	<input type="text" class="form-control" placeholder="Exp. '2015'" name="keluar" required>
      	</fieldset>
        <fieldset class="form-group">
          <label>Lampiran (Ijazah)</label>
          <input type="file" name="foto" class="form-control-file">
          <i>Gambar/Pdf Ukuran Maks. 2Mb</i>
        </fieldset>
      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
  	</form>
  </div>
</div>