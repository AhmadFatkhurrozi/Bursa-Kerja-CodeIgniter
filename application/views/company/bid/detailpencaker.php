<style>
  table{
    font-size: 14px;
  }
</style>
<div>
  <h4><i class="fa fa-book"></i><strong> Curriculum Vitae Pencaker</strong></h4>
</div>

<div class="row">
  <div class=" col-md-12">
  <div class="table-responsive"> 
    <table class="table table-hover">
      <tbody>
        <?php foreach( $query_pencaker as $a ){ ?>
        <tr>
          <td colspan="2">
              <div class="card mb-3">
                <div class="card-header bg-info">
                  <i class="fas fa-chart-area"></i>
                  <strong class="text-light"><i class="fa fa-user"></i> Profil Pencaker</strong>
                  <a class="btn btn-danger float-right btn-sm" href="<?php echo site_url('company/cetak/').$a->ID_PENCAKER; ?>">
                      <i class="fa fa-print"></i> cetak pdf 
                  </a>
                </div>
              </div>
          </td>
        </tr>
         <tr>
          <td colspan="2" align="center">
             <h5>Pas Foto</h5>
             <a href="#gambar" class="btn-gbr" data-toggle="modal" data-gambar="<?=base_url()?>dist/img/pencaker/<?=$a->FOTO;?>">
                 <img src="<?=base_url()?>dist/img/pencaker/<?=$a->FOTO;?>" width="200" height="200" class="img-fluid">
              </a>
             <br><hr>
             <h5>KTP</h5>
             <a href="#gambar" class="btn-gbr" data-toggle="modal" data-gambar="<?=base_url()?>dist/img/pencaker/ktp/<?=$a->FOTO_KTP;?>">
                 <img src="<?=base_url()?>dist/img/pencaker/ktp/<?=$a->FOTO_KTP;?>" height="150">
              </a>
          </td>
        </tr>
        <tr>
          <td><b>NIK</b></td>
          <td><?=$a->NIK;?></td>
        </tr>
        <tr>
          <td><b>Nama</b></td>
          <td><?=$a->NAMA_PENCAKER;?></td>
        </tr>
        <tr>
          <td><b>Jenis Kelamin</b></td>
          <td><?=$a->JK;?></td>
        </tr>
        <tr>
          <td><b>Tempat <br>Tanggal Lahir</b></td>
          <td><?=$a->TEMPAT_LAHIR;?><br>
              <?=mediumdate_indo($a->TGL_LAHIR);?>
          </td>
        </tr>
        <tr>
          <td><b>Status</b></td>
          <td><?=$a->STATUS_KAWIN;?></td>
        </tr>
        <tr>
          <td><b>Agama</b></td>
          <td><?=$a->AGAMA;?></td>
        </tr>
        <tr>
          <td><b>Email</b></td>
          <td><?=$a->EMAIL;?></td>
        </tr>
        <tr>
          <td><b>Telepon</b></td>
          <td><?=$a->TELEPON;?></td>
        </tr>
        <tr>
          <td><b>Alamat</b></td>
          <td><?=$a->ALAMAT;?></td>
        </tr>
        <?php } ?>
         </tbody>
    </table>
  </div>

  <hr>
  <div class="detail text-center">
    <h4><i class="fa fa-history"></i><b> Riwayat Pendidikan</b></h4>
  </div>
  <br>

  <div class="table-responsive"> 
    <table class="table table-hover">
      <thead class="bg-primary">
        <tr>
          <th><b>Tingkat Pendidikan</b></th>
          <th><b>Nama Sekolah</b></th>
          <th><b>Jurusan</b></th>
          <th><b>Alamat Sekolah</b></th>
          <th><b>Tahun Masuk</b></th>
          <th><b>Tahun Lulus</b></th>
          <th><b>Lampiran</b></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach( $query_pendidikan as $a ){ ?>
        <tr>
          <td><?php echo $a->TINGKAT_PENDIDIKAN; ?></td>
          <td><?php echo $a->NAMA_SEKOLAH; ?></td>
          <td><?php echo $a->JURUSAN; ?></td>
          <td><?php echo $a->ALAMAT_SEKOLAH; ?></td>
          <td><?php echo $a->TAHUN_MASUK; ?></td>
          <td><?php echo $a->TAHUN_LULUS; ?></td>
          <td>
            <a href="<?=base_url()?>dist/img/pencaker/pendidikan/<?=$a->LAMPIRAN;?>">
               <?php echo $a->LAMPIRAN; ?>
            </a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>

  <hr>
  <div class="detail text-center">
    <h4><i class="fa fa-history"></i><b> Pengalaman Kerja</b></h4>
  </div>
  <br>

  <div class="table-responsive"> 
    <table class="table table-hover">
      <thead class="bg-primary">
        <tr>
          <th><b>Nama Perusahaan</b></th>
          <th><b>Jabatan</b></th>
          <th><b>Deskripsi Jabatan</b></th>
          <th><b>Bidang Perusahaan</b></th>
          <th><b>Tanggal Masuk</b></th>
          <th><b>Tanggal Keluar</b></th>
          <th><b>Lampiran</b></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach( $query_pengalaman as $a ){ ?>
        <tr>
          <td><?php echo $a->NAMA_PERUSAHAAN; ?></td>
          <td><?php echo $a->JABATAN; ?></td>
          <td><?php echo $a->DESKRIPSI_JABATAN; ?></td>
          <td><?php echo $a->BIDANG_PERUSAHAAN; ?></td>
          <td><?php echo mediumdate_indo($a->TGL_MASUK); ?></td>
          <td><?php echo mediumdate_indo($a->TGL_KELUAR); ?></td>
          <td>
            <a href="<?=base_url()?>dist/img/pencaker/pengalaman/<?=$a->LAMPIRAN;?>">
               <?php echo $a->LAMPIRAN; ?>
            </a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>

  <hr>
  <div class="detail text-center">
    <h4><i class="fa fa-gear"></i><b> Keahlian</b></h4>
  </div>
  <br>

  <div class="table-responsive"> 
    <table class="table table-hover">
      <thead class="bg-primary">
        <tr>
          <th><b>Bidang Keahlian</b></th>
          <th><b>Deskripsi</b></th>
          <th><b>Lampiran</b></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach( $query_skill as $a ){ ?>
        <tr>
          <td><?php echo $a->BIDANG_KEAHLIAN; ?></td>
          <td><?php echo $a->DESKRIPSI_KEAHLIAN; ?></td>
          <td>
            <a href="<?=base_url()?>dist/img/pencaker/keahlian/<?=$a->LAMPIRAN;?>">
               <?php echo $a->LAMPIRAN; ?>
            </a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>

  <hr>
  <div class="detail text-center">
    <h4><i class="fa fa-history"></i><b> History Lamaran</b></h4>
  </div>
  <br>

  <div class="table-responsive"> 
    <table class="table table-hover alert alert-warning" style="width: 100%">
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
        <?php $no=1; ?>
        <?php foreach ($query_history as $a) { ?>
        <tr>
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
         
     
  </div>
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
            <center><img id="detail" height="70%" width="70%"></center>
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