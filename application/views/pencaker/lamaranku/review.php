    <div>
      <h4><i class="fa fa-send"></i><span> Hasil Review Perusahaan</span></h4>
    </div>
    <hr><br>
 <div class="table-responsive"> 
                <table class="table table-hover" style="width: 100%">
                  <thead class="bg-primary text-dark">
                    <tr>
                      <th>No.</th>
                      <th>Lowongan</th>
                      <th>Perusahaan</th>
                      <th>Hasil</th>
                      <th>Catatan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  $data = $this->db->where('review.ID_PENCAKER', $this->session->userdata('__ci_pencaker_idpk'))
                                            ->join('bid' , 'bid.ID_LOWONGAN = lowongan.ID_LOWONGAN')
                                            ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN')
                                            ->join('review', 'review.ID_BID = bid.ID_BID')  
                                            ->get('lowongan'); ?>

                    <?php if($data->num_rows() == 0 ) { ?>
                      <tr>
                        <td colspan="5">Tidak Ada Data</td>
                      </tr>
                    <?php } ?>

                    <?php $no=1; foreach ($query_bid as $a) { ?>
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
                      <td>
                        <span class="badge badge-<?php echo ( $a->HASIL_REVIEW == 'Ditolak' )? 'danger' : 'success' ?>"><?php echo $a->HASIL_REVIEW; ?></span>
                      </td>
                      <td><?=$a->CATATAN;?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>