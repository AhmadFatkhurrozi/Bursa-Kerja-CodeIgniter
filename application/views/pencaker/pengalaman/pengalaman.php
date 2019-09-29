<div>
  <h4><i class="fa fa-history"></i><span> Pengalaman Kerja</span></h4>
</div>

<hr>

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<br>

<div class="row">
  <div class="col-md-12 alert alert-dark">
    <a href="<?php echo base_url()?>pencaker/tambahPeng" class="btn btn-primary btn-sm">
      <i class="fa fa-plus"></i> Tambah Data
    </a><br><br>
    <?php foreach ($query_pengalaman->result() as $a) { ?>
    <table class="table table-info alert alert-info text-dark">
      <tbody>
        <tr>
          <td><b>Nama Perusahaan</b></td>
          <td><?php echo $a->NAMA_PERUSAHAAN; ?></td>
        </tr>
        <tr>
          <td><b>Jabatan</b></td>
          <td><?php echo $a->JABATAN; ?></td>
        </tr>
         <tr>
          <td><b>Deskripsi Jabatan</b></td>
          <td><?php echo $a->DESKRIPSI_JABATAN; ?></td>
        </tr>
         <tr>
          <td><b>Bidang Perusahaan</b></td>
          <td><?php echo $a->BIDANG_PERUSAHAAN; ?></td>
        </tr>
         <tr>
          <td><b>Tanggal Masuk</b></td>
          <td><?php echo mediumdate_indo($a->TGL_MASUK); ?></td>
        </tr>
         <tr>
          <td><b>Tanggal Keluar</b></td>
          <td><?php echo mediumdate_indo($a->TGL_KELUAR); ?></td>
        </tr>
         <tr>
          <td><b>Lampiran</b></td>
          <td>
            <a href="<?=base_url()?>dist/img/pencaker/pengalaman/<?=$a->LAMPIRAN;?>">
               <?php echo $a->LAMPIRAN; ?>
            </a>
          </td>
        </tr>
        <tr class="text-center">
          <td colspan="2">
            <div class="btn-group">
              <a href="<?=base_url()?>pencaker/editPeng/<?=$a->ID_PENGALAMAN;?>" class="btn btn-success text-light btn-sm">
                <i class="fa fa-edit"></i>
                <span class="btnm">Edit</span>
              </a>
              <a href="<?=base_url()?>pencaker/hapusPeng/<?=$a->ID_PENGALAMAN;?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger text-light btn-sm">
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