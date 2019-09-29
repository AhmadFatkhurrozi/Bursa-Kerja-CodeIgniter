<div>
	<h4><i class="fa fa-user"></i><span>Edit Keahlian</span></h4>
</div>

<hr>

<div class="row">
  <div class="col-md-12"><br>
  	<?php foreach($query_keahlian as $a){ ?> 
  	<form action="<?=base_url()?>pencaker/ubahSkill" method="post" accept-charset="utf-8">
  		<fieldset class="form-group">
        	<input type="hidden" class="form-control" value="<?=$a->ID_KEAHLIAN;?>" name="id_keahlian">
      	</fieldset>
  		<fieldset class="form-group">
        	<label>Bidang Keahlian</label>
        	<input type="text" class="form-control" value="<?=$a->BIDANG_KEAHLIAN;?>" name="bidang">
      	</fieldset>
      	<fieldset class="form-group">
            <label>Deskripsi</label>
              <textarea name="deskripsi" class="form-control"><?=$a->DESKRIPSI_KEAHLIAN;?></textarea>   
        </fieldset>
      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> Perbarui</button>
  	</form>
    <br>
  	<?php echo form_open_multipart('pencaker/uploadSkill/'.$a->ID_KEAHLIAN); ?>
  		<fieldset class="form-group">
        	<label>Lampiran (lampirkan file jpg/png)</label>
        	<input type="file" class="form-control-file" name="foto">
        	<i>Gambar/Pdf Ukuran Maks 2Mb</i>
      	</fieldset>
      	<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
      	<button type="submit" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Upload</button>
        <a href="<?php echo base_url();?>pencaker/keahlian" class="btn btn-light btn-sm">Kembali</a>
  	</form>
  	<?php } ?> 
  </div>
</div>