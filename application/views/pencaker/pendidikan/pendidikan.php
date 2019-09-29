<div>
  <h4><i class="fa fa-history"></i><span> Riwayat Pendidikan</span></h4>
</div>
  
<hr>

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<br>
  
<div class="row">
  <div class="col-md-12 alert alert-dark"> 
    <a href="<?php echo base_url()?>pencaker/tambahPend" class="btn btn-primary btn-sm">
      <i class="fa fa-plus"></i> Tambah Data
    </a><br><br>
    <?php foreach( $query_pendidikan->result() as $a ){ ?>
    <table class="table table-info text-dark alert alert-info">
      <tbody>
        <tr>
          <td><b>Tingkat Pendidikan</b></td>
          <td><?php echo $a->TINGKAT_PENDIDIKAN; ?></td>
        </tr>
        <tr>
          <td><b>Nama Sekolah</b></td>
          <td><?php echo $a->NAMA_SEKOLAH; ?></td>
        </tr>
        <tr>
          <td><b>Jurusan</b></td>
          <td><?php echo $a->JURUSAN; ?></td>
        </tr>
        <tr>
          <td><b>Alamat Sekolah</b></td>
          <td><?php echo $a->ALAMAT_SEKOLAH; ?></td>
        </tr>
        <tr>
          <td><b>Tahun Masuk</b></td>
          <td><?php echo $a->TAHUN_MASUK; ?></td>
        </tr>
        <tr>
          <td><b>Tahun Lulus</b></td>
          <td><?php echo $a->TAHUN_LULUS; ?></td>
        </tr>
         <tr>
          <td><b>Lampiran</b></td>
          <td>
            <a href="<?=base_url()?>dist/img/pencaker/pendidikan/<?=$a->LAMPIRAN;?>">
               <?php echo $a->LAMPIRAN; ?>
            </a>
          </td>
        </tr>
        <tr class="text-center">
          <td colspan="2">
            <div class="btn-group">
              <a href="<?=base_url()?>pencaker/editPend/<?=$a->ID_PENDIDIKAN?>" class="btn btn-success text-light btn-sm">
                <i class="fa fa-edit"></i>
                <span class="btnm">Edit</span>
              </a>
              <a href="<?=base_url()?>pencaker/hapusPend/<?=$a->ID_PENDIDIKAN?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger text-light btn-sm">
                <i class="fa fa-trash"></i>
                <span class="btnm">Hapus</span>
              </a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <?php } ?>
  </div>
</div>