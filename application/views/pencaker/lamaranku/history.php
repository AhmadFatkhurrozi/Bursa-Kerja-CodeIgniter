<div>
  <h4><i class="fa fa-history"></i><span> History Lamaran Kerja Saya</span></h4>
</div>

<hr><br>

<div class="table-responsive"> 
  <table class="table table-warning" style="width: 100%">
    <thead class="bg-info text-dark">
      <tr>
        <th>No.</th>
        <th>Lowongan</th>
        <th>Perusahaan</th>
        <th>Tanggal</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php 
          $data = $this->db->where('history.ID_PENCAKER', $this->session->userdata('__ci_pencaker_idpk'))
                           ->join('pencaker', 'pencaker.ID_PENCAKER = history.ID_PENCAKER')
                           ->join('lowongan', 'lowongan.ID_LOWONGAN=history.ID_LOWONGAN')
                           ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = history.ID_PERUSAHAAN')
                           ->get('history');
       ?>
      <?php if($data->num_rows() == 0 ) { ?>
        <tr>
          <td colspan="5">Tidak Ada Data</td>
        </tr>
      <?php } ?>
      
      <?php $no=1; foreach ($query_bid as $a) { ?>
      <tr style="text-decoration: none; color: black;">
        <td><?php echo $no++; ?></td>
        <td><?=$a->JUDUL; ?></td>
        <td><?=$a->NAMA_PERUSAHAAN;?></td>
        <td><i><?=mediumdate_indo($a->TGL_BID);?></i></td>
        <td><span class="badge badge-<?php echo ( $a->STATUS_HISTORY == 'dibatalkan')? 'danger' : 'info' ?>"><?=$a->STATUS_HISTORY?></span></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>