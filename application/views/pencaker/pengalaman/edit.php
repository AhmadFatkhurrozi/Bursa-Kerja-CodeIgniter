<div>
	<h4><i class="fa fa-user"></i><span>Edit Pengalaman Kerja</span></h4>
</div>

<hr>

<div class="row">
  <div class="col-md-12"><br>
  	<?php foreach($query_pengalaman as $a){ ?> 
  	<form action="<?=base_url()?>pencaker/ubahPeng" method="post" accept-charset="utf-8">
  		<fieldset class="form-group">
        	<input type="hidden" class="form-control" name="id_pengalaman" value="<?php echo $a->ID_PENGALAMAN; ?>">
      	</fieldset>
  		<fieldset class="form-group">
        	<label>Nama Perusahaan</label>
        	<input type="text" class="form-control" value="<?=$a->NAMA_PERUSAHAAN;?>" name="compname">
      	</fieldset>
      	<fieldset class="form-group">
        	<label>Jabatan</label>
        	<input type="text" class="form-control" value="<?=$a->JABATAN;?>" name="jabatan">
      	</fieldset>
      	<fieldset class="form-group">
            <label>Deskripsi Jabatan</label>
              <textarea name="deskripsi" class="form-control"><?=$a->DESKRIPSI_JABATAN;?></textarea>   
        </fieldset>
        <fieldset class="form-group">
        	<label>Bidang Perusahaan</label>
        	<input type="text" class="form-control" value="<?=$a->BIDANG_PERUSAHAAN;?>" name="bidang">
      	</fieldset>
        <fieldset class="form-group">
        	<label>Tanggal Masuk</label>
        	<input type="date" class="form-control" value="<?=$a->TGL_MASUK;?>" name="masuk">
      	</fieldset>
      	<fieldset class="form-group">
        	<label>Tanggal Keluar</label>
        	<input type="date" class="form-control" value="<?=$a->TGL_KELUAR;?>" name="keluar">
      	</fieldset>
      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> Perbarui</button>
  	</form>
    <br>
  	<?php echo form_open_multipart('pencaker/uploadPeng/'.$a->ID_PENGALAMAN); ?>
  		<fieldset class="form-group">
        	<label>Lampiran (lampirkan file jpg/png)</label>
        	<input type="file" class="form-control-file" name="foto">
        	<i>Gambar/Pdf Ukuran Maks 2Mb</i>
      	</fieldset>
      	<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
      	<button type="submit" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Upload</button>
        <a href="<?php echo base_url();?>pencaker/pengalaman" class="btn btn-light btn-sm">Kembali</a>
  	</form>
  <?php } ?>
  </div>
</div>