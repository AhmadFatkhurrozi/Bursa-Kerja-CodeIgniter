<script>tinymce.init({ selector:'textarea', theme: 'modern'});</script>
  <div>
    <h4>Tindakan</h4>
  </div>
  <hr>

<div class="row">
  	  <div class="col-md-12" id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
	  <div class="col-md-12">
	  	<?php foreach($query_bid as $a){ ?>
	  	<form action="<?=base_url()?>company/tambahkanCatatan" method="post" accept-charset="utf-8">
	  		<fieldset class="form-group">
	  			<label>ID BID</label>
	  			<input type="text" class="form-control" name="idbid" value="<?=$a->ID_BID?>" readonly>
	  		</fieldset>
	  		<fieldset class="form-group">
	        	<label>Aksi</label>
	          	<select class="form-control" name="status">
		            <option value="Diterima">Terima</option>
		            <option value="Ditolak">Tolak</option>
	           	</select>
	        </fieldset>
	      	<fieldset class="form-group">
	            <label>Tulis Catatan</label>
	            <textarea name="catatan" class="form-control"><?=$a->CATATAN;?></textarea>
	        </fieldset>
	    	<?php } ?>
	      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-send"></i> Kirim</button>
	  	</form>
	  </div>
</div>