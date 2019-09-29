<script>tinymce.init({ selector:'textarea', theme: 'modern'});</script>
<style>
  .form-group{
    font-size: 14px;
  }
</style>
<div>
	<h4><span class="text-success" style="border-left: 4px solid; padding-left: 4px;"> Tambah Lowongan</span></h4>
</div>

  <hr>

<div class="row">
  <div class="col-md-12">
  	<?php echo form_open_multipart('company/tambahkanLowongan'); ?>
    		<fieldset class="form-group">
    			<label>Kategori</label>
			    <select class="form-control" name="kategori">
				    <?php foreach ($query_kategori->result() as $a) { ?>
              	<option value="<?=$a->ID_KATEGORI;?>"><?=$a->NAMA_KATEGORI;?></option>
            <?php } ?>
        	</select>
    		</fieldset>
    		<fieldset class="form-group">
          	<label>Judul</label>
          	<input type="text" class="form-control" placeholder="Judul Lowongan" name="judul" required> 
      	</fieldset>
      	<fieldset class="form-group">
        	<label>Lowongan Berakhir</label>
        	<input type="date" class="form-control" name="selesai">
      	</fieldset>
      	<fieldset class="form-group">
        	<label>Gaji</label>
        	<input type="text" class="form-control" name="gaji" placeholder="Masukkan Gaji" required>
      	</fieldset>
        <fieldset class="form-group">
          <label>Kuota</label>
          <input type="number" name="kuota" class="form-control" placeholder="jumlah kuota" required>
        </fieldset>
        <fieldset class="form-group">
          <label>Gambar</label>
          <input type="file" class="form-control-file btn-sm" name="foto">
        </fieldset>
      	<fieldset class="form-group">
            <label>Deskripsi Lowongan</label>
              <textarea name="deskripsi" class="form-control" placeholder="masukkan Deskripsi"></textarea>
        </fieldset>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
    </form>
  </div>
</div>


