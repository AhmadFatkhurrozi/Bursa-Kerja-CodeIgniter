<style>
  table{
    font-size: 14px;
  }
</style>
<div>
  <h4><span class="text-success" style="border-left: 4px solid; padding-left: 4px;"> Lamaran Masuk</span></h4>
</div><hr><br>
  
<form>
  <div class="table-responsive"> 
      <table class="table table-hover" style="width: 100%">
        <thead class="bg-primary text-dark">
          <tr>
            <th>No.</th>
            <th>Lowongan</th>
            <th>Pelamar</th>
            <th>BID Dikirim</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
                $data = $this->db->where('bid.ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
                                 ->join('lowongan' , 'bid.ID_LOWONGAN = lowongan.ID_LOWONGAN')
                                 ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = bid.ID_PERUSAHAAN')
                                 ->get('bid'); ?>

            <?php if($data->num_rows() == 0) { ?>
              <tr>
                <td colspan="5">Tidak Ada Data</td>
              </tr>
            <?php } ?>
            
          <?php $no=1; ?>
          <?php foreach ($query_bid as $a) { ?>
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
            <td><i><?=mediumdate_indo($a->TGL_BID);?></i></td>
            <td>
              <?php if ($a->STATUS_BID == "0") { ?>
                 <?php echo anchor('company/tambahCatatan/'.$a->ID_BID,'
                  <btn class="btn btn-primary text-light btn-sm">
                    <i class="fa fa-plus"></i>
                    <span class="btnm">tambah</span>
                  </btn>');
                ?>
              <?php } else { ?>
                  <span class="badge badge-success"><i class="fa fa-check"></i> Review Terkirim!</span>
              <?php } ?>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
  </div>
</form>