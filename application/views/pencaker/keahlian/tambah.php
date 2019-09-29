<div>
	<h4><i class="fa fa-user"></i><span>Tambah Keahlian</span></h4>
</div>

<hr>

<div class="row">
  <div class="col-md-12"><br>
    <?php echo form_open_multipart('pencaker/tambahkanSkill'); ?>
  		<fieldset class="form-group">
        	<label>Bidang Keahlian</label>
        	<input type="text" class="form-control" placeholder="Masukkan Bidang Keahlian" name="bidang" required>
      	</fieldset>
      	<fieldset class="form-group">
            <label>Deskripsi</label>
              <textarea name="deskripsi" class="form-control" placeholder="masukkan Deskripsi" required></textarea>
        </fieldset>
        <fieldset class="form-group">
          <label>Lampiran (Sertifikat/ sejenisnya)</label>
          <input type="file" name="foto" class="form-control-file">
          <i>Gambar/Pdf Ukuran Maks. 2Mb</i>
        </fieldset>
      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
  	</form>
  </div>
</div>