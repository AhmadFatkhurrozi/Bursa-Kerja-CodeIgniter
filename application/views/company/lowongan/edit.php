<style>
  .form-group{
    font-size: 14px;
  }
</style>
<script>tinymce.init({ selector:'textarea', theme: 'modern'});</script>
<div>
	<h4><i class="fa fa-user"></i><span> Edit Lowongan</span></h4>
</div>

  <hr>

<div class="row">
  <div class="col-md-12">
  	<?php foreach($query_lowongan as $a){ ?>

      <div class="row">
        <div class="col-md-4 text-center"><br>
          <img alt="User Picture" src="<?=base_url()?>dist/img/lowongan/<?php echo $a->GAMBAR; ?>" width="200" height="200" class="img-circle img-responsive" style="border-radius: 50%;">
        </div>
        <div class="col-md-6" style="margin-top: 50px;"><br>
          <?php echo form_open_multipart('company/uploadLow/'.$a->ID_LOWONGAN); ?>
            <fieldset class="form-group">
                <input type="file" class="form-control-file btn-sm" name="foto">
            </fieldset>
              <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 7px;">
                <i class="fa fa-upload"></i> Upload
              </button>
          </form>
          <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
        </div>
      </div><br>

  	<form action="<?=base_url()?>company/ubahLowongan" method="post" accept-charset="utf-8">
  		<fieldset>
  			<input type="hidden" name="id_lowongan" value="<?=$a->ID_LOWONGAN?>">
  		</fieldset>
  		<fieldset class="form-group">
  			<label>Kategori</label>
				<input type="text" class="form-control" name="kategori" value="<?=$a->NAMA_KATEGORI;?>" readonly>
  		</fieldset><br>
  		<fieldset class="form-group">
      	<label>Judul</label>
      	<input type="text" class="form-control" name="judul" value="<?=$a->JUDUL;?>">
    	</fieldset>
    	<fieldset class="form-group">
      	<label>Lowongan Berkahir</label>
      	<input type="date" class="form-control" name="selesai" value="<?=$a->TGL_SELESAI;?>">
    	</fieldset>
    	<fieldset class="form-group">
      	<label>Gaji</label>
      	<input type="text" class="form-control" name="gaji" value="<?=$a->GAJI;?>">
    	</fieldset>
      <fieldset class="form-group">
        <label>Kuota</label>
        <input type="text" class="form-control" name="kuota" value="<?=$a->KUOTA;?>">
      </fieldset>
    	<fieldset class="form-group">
          <label>Deskripsi Lowongan</label>
            <textarea name="deskripsi" class="form-control"><?=$a->DESKRIPSI;?></textarea>
      </fieldset>
  	  <?php } ?>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> perbarui</button>
  	</form>
  </div>
</div>