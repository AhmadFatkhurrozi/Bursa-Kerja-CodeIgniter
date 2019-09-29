<div>
	<h4><i class="fa fa-user"></i><span>Tambah Pengalaman Kerja</span></h4>
</div>

<hr>

<div class="row">
  <div class="col-md-12"><br>
    <?php echo form_open_multipart('pencaker/tambahkanPeng'); ?>
  		<fieldset class="form-group">
        	<label>Nama Perusahaan</label>
        	<input type="text" class="form-control" placeholder="Masukkan Nama Perusahaan" name="compname" required>
      	</fieldset>
      	<fieldset class="form-group">
        	<label>Jabatan</label>
        	<input type="text" class="form-control" placeholder="Masukkan Jabatan" name="jabatan" required>
      	</fieldset>
      	<fieldset class="form-group">
            <label>Deskripsi Jabatan</label>
              <textarea name="deskripsi" class="form-control" placeholder="masukkan deskripsi jabatan" required></textarea>   
        </fieldset>
        <fieldset class="form-group">
        	<label>Bidang Perusahaan</label>
        	<input type="text" class="form-control" placeholder="Masukkan Bidang Perusahaan" name="bidang" required>
      	</fieldset>
        <fieldset class="form-group">
        	<label>Tanggal Masuk</label>
        	<input type="date" class="form-control" name="masuk" required>
      	</fieldset>
      	<fieldset class="form-group">
        	<label>Tanggal Keluar</label>
        	<input type="date" class="form-control" name="keluar" required>
      	</fieldset>
        <fieldset class="form-group">
          <label>Lampiran (lampirkan file jpg/png)</label>
          <input type="file" name="foto" class="form-control-file">
          <i>Gambar/Pdf Ukuran Maks. 2Mb</i>
        </fieldset>
      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
  	</form>
  </div>
</div>