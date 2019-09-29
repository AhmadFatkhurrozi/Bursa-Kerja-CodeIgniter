<style>
  .btn-gbr{
    height: 30px;
  }
</style>
<ol class="breadcrumb">
    <h6 class="breadcrumb-item">
      <i class="fa fa-home"></i>
      <a href="<?=base_url()?>admin">Dashboard</a>
    </h6>
    <h6 class="breadcrumb-item active">Pemberitahuan</h6>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <h5>
      <i class="fa fa-envelope"></i>
      <span>Data Lowongan Masuk</span>
    </h5>
  </div>
  <form>
  <div class="card-body">
    <button type="submit" formaction="<?php echo base_url() ?>admin/validasiLowongan" formmethod="POST" class="btn btn-outline-success btnmob btn-sm" style="margin-bottom: 5px;">
      <span>Validasi Terpilih</span>
    </button>
    <button type="submit" formaction="<?php echo base_url() ?>admin/rejectLowongan" formmethod="POST" class="btn btn-danger btnmob btn-sm" style="margin-bottom: 5px;">
      <span>Reject</span>
    </button>

    <div class="table-responsive">
      <table class="table table-hover" style="width: 100%">
        <thead class="bg-primary text-dark">
          <tr>
            <th><input id="checkAll" type="checkbox"></th>
            <th>No.</th>
            <th>Perusahaan</th>
            <th>Lowongan</th>
            <th>Gaji</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Gambar</th>
            <th>Pilihan</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; 
                $data = $this->db->where('STATUS_LOWONGAN', 'Pending')
                                 ->get('lowongan');
   
              if ($data->num_rows() == 0 ) { ?>
           <tr>
             <td colspan="9">Tidak Ada Data</td>
           </tr>    
          <?php } ?> 
           
          <?php foreach ($query_pekerjaan->result() as $a) { ?>
          <tr class="text-center">
            <td><input type="checkbox" name="pilih[]" value="<?php echo $a->ID_LOWONGAN; ?>"></td>
            <td><?php echo $no++; ?></td>
            <td>
              <a href="<?=base_url()?>admin/detailCompany/<?=$a->ID_PERUSAHAAN;?>"><?php echo $a->NAMA_PERUSAHAAN; ?></a>
            </td>
            <td>
              <a href="<?=base_url()?>admin/detailLowongan/<?=$a->ID_LOWONGAN;?>"><?php echo $a->JUDUL; ?></a>
            </td>
            <td><?php echo $a->GAJI; ?></td>
            <td><?php echo mediumdate_indo($a->TGL_MULAI); ?></td>
            <td><?php echo mediumdate_indo($a->TGL_SELESAI); ?></td>
            <td class="text-center">
              <a href="#gambar" class="btn-gbr" data-toggle="modal" data-gambar="<?=base_url()?>dist/img/lowongan/<?php echo $a->GAMBAR; ?>">
                <img class="btn-gbr img-thumbnail" src="<?=base_url()?>dist/img/lowongan/<?php echo $a->GAMBAR; ?>">
              </a>
            </td>
            <td>
              <span class="badge badge-<?php echo ( $a->STATUS_LOWONGAN == 'Tervalidasi' )? 'success' : 'danger' ?>"><?php echo $a->STATUS_LOWONGAN; ?></span>
            </td>
          </tr>
          <?php  } ?>
        </tbody>
      </table>
    </div>
  </div>
</form>
</div>

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