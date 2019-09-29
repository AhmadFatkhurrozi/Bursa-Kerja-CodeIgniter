<style>
  table{
    font-size: 14px;
  }
</style>
<div>
  <h4><span class="text-success" style="border-left: 4px solid; padding-left: 4px;"> Hasil Review Perusahaan</span></h4>
</div><hr><br>
    
<div class="table-responsive"> 
  <table class="table table-hover" style="width: 100%">
    <thead class="bg-primary text-dark">
      <tr>
        <th>No.</th>
        <th>Lowongan</th>
        <th>Pencaker</th>
        <th>Hasil</th>
        <th>Catatan</th>
      </tr>
    </thead>
    <tbody>
      <?php  $data = $this->db->where('review.ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
                              ->where('bid.STATUS_BID', 1)
                              ->join('bid' , 'bid.ID_LOWONGAN = lowongan.ID_LOWONGAN')
                              ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN')
                              ->join('review', 'review.ID_BID = bid.ID_BID')  
                              ->get('lowongan'); ?>

      <?php if($data->num_rows() == 0 ) { ?>
        <tr>
          <td colspan="5">Tidak Ada Data</td>
        </tr>
      <?php } ?>

      <?php $no=1; foreach ($query_bid->result() as $a) if ($a->STATUS_BID == 1) { ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td>
          <a href="<?php echo site_url('company/lowonganDetail/').$a->ID_LOWONGAN; ?>">
          <?php echo $a->JUDUL; ?>
          </a>  
        </td>
        <td>
          <a href="<?php echo site_url('company/detailPenc/').$a->ID_PENCAKER; ?>">
          <?php echo $a->NAMA_PENCAKER;?>
          </a>  
        </td>
        <td>
          <span class="badge badge-<?php echo ( $a->HASIL_REVIEW == 'Ditolak' )? 'danger' : 'success' ?>"><?php echo $a->HASIL_REVIEW; ?></span>
        </td>
        <td><?=$a->CATATAN;?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>