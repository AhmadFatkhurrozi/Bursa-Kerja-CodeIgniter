<style>
  .btn-gbr{
      height: 50px;
    }
   table{
   		font-size: 14px;
    }
</style>

<div>
    <h4><i class="fa fa-suitcase"></i><span> Data Lowongan</span></h4>
</div><hr>
	
<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<?php foreach( $query_lowongan as $a ){ ?>
<div class="row">
	<div class="col-md-12 alert alert-warning" style="border-left: 3px solid">
		
	    <table class="table table-info alert alert-info">
	      <tbody>
	        <tr>
	          <td width="20%"><b>Judul </b></td>
	          <td>:</td>
	          <td width="80%"><?=$a->JUDUL;?></td>
	          <td rowspan="2">
	          	<a href="#gambar" class="btn-gbr" data-toggle="modal" data-gambar="<?=base_url()?>dist/img/lowongan/<?php echo $a->GAMBAR; ?>">
                   <img class="btn-gbr" src="<?=base_url()?>dist/img/lowongan/<?php echo $a->GAMBAR; ?>">
                </a>
	          </td>
	        </tr>
	        <tr>
	          <td width="20%"><b>Kategori </b></td>
	          <td>:</td>
	          <td width="80%"><?=$a->NAMA_KATEGORI;?></td>
	        </tr>
	      </tbody>
	    </table>
		<div class="h5">
			<span class="badge badge-info">
				Bid Count: <?php echo $this->db->where('ID_LOWONGAN', $a->ID_LOWONGAN)
											   ->get('bid')->num_rows(); ?>
			</span>
			<span class="badge badge-success">
				Kuota: <?=$a->KUOTA;?>
			</span>
			<span class="badge badge-<?php echo ( $a->STATUS_LOWONGAN == 'Tervalidasi' )? 'primary' : 'danger' ?>">
				Status : <?=$a->STATUS_LOWONGAN;?>
			</span>
		</div>
		<div class="btn-group float-right">
			<a href="<?=base_url()?>company/lowonganDetail/<?=$a->ID_LOWONGAN;?>" 
				class="btn btn-info btn-sm text-light">
	    		<i class="fa fa-info"></i> 
	    		<span class="btnm">Detail</span>
	    	</a>
			<a href="<?=base_url()?>company/editLowongan/<?=$a->ID_LOWONGAN;?>" 
				class="btn btn-success btn-sm text-light">
	    		<i class="fa fa-edit"></i> 
	    		<span class="btnm">Edit</span>
	    	</a>
			<a href="<?=base_url()?>company/hapusLowongan/<?=$a->ID_LOWONGAN;?>" onclick="return confirm('Yakin Hapus?')" 
				class="btn btn-danger btn-sm text-light">
	    		<i class="fa fa-trash"></i> 
	    		<span class="btnm">Hapus</span>
	    	</a>
		</div>
		<div class="text-dark" style="font-size: 14px; display: inline-block;">
			<table>
				<tbody>
					<tr>
						<td>Mulai</td>
						<td>:</td>
						<td><?php echo mediumdate_indo($a->TGL_MULAI); ?></td>
					</tr>
					<tr>
						<td>Berakhir</td>
						<td>:</td>
						<td><?php echo mediumdate_indo($a->TGL_SELESAI); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		
	</div>
</div>
<?php } ?>

<?php echo $pagination; ?>

<div class="modal fade" id="gambar">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Preview</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
          </div>
          <div class="modal-body">
            <img id="detail" height="100%" width="100%">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">tutup</button>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
    $('.btn-gbr').on('click', function () {
      $('#detail').attr('src', $(this).data('gambar'));
    })
</script>