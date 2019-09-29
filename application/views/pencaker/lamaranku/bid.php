<div>
  <h4><i class="fa fa-send"></i><span> Lamaran Kerja Saya</span></h4>
</div>

<hr><br>

<div class="table-responsive"> 
  <table class="table table-light" style="width: 100%">
    <thead class="bg-primary text-dark">
      <tr>
        <th>No.</th>
        <th>Lowongan</th>
        <th>Perusahaan</th>
        <th>BID Dikirim</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
          $data = $this->db->where('bid.ID_PENCAKER', $this->session->userdata('__ci_pencaker_idpk'))
                           ->join('lowongan' , 'bid.ID_LOWONGAN = lowongan.ID_LOWONGAN')
                           ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = bid.ID_PERUSAHAAN')
                           ->get('bid');
       ?>
     <?php if($data->num_rows() == 0) { ?>
        <tr>
          <td colspan="5">Tidak Ada Data</td>
        </tr>
      <?php } ?>

      <?php $no=1; foreach ($query_bid->result() as $a) if ($a->STATUS_BID == 0) { ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td>
            <a href="<?php echo site_url('pencaker/lowonganDetail/').$a->ID_LOWONGAN; ?>">
            <?php echo $a->JUDUL; ?>
            </a>  
          </td>
          <td>
            <a href="<?php echo site_url('pencaker/detailComp/').$a->ID_PERUSAHAAN; ?>">
            <?php echo $a->NAMA_PERUSAHAAN;?>
            </a>  
          </td>
          <td><i><?=mediumdate_indo($a->TGL_BID);?></i></td>
          <td>
              <a href="<?=base_url()?>pencaker/hapusBid/<?=$a->ID_BID;?>" onclick="return confirm('Membatalkan akan menurunkan reputasi, yakin batalkan?')" class="btn btn-danger text-light btn-sm">
                <i class="fa fa-times"></i>
                <span class="btnm">Batalkan</span>
              </a>
          </td>
        </tr>
        <?php } ?>
    </tbody>
  </table>
</div>