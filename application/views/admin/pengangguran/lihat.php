<ol class="breadcrumb">
    <h6 class="breadcrumb-item">
      <i class="fa fa-home"></i>
      <a href="<?=base_url()?>admin">Dashboard</a>
    </h6>
    <h6 class="breadcrumb-item active">Data Pengangguran</h6>
</ol>
<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="card mb-3">
  <div class="card-header">
    <h5>
      <i class="fa fa-table"></i>
      <span>Data Pengangguran</span>
    </h5>
  </div>
  <div class="card-body">
    <a href="<?php echo base_url() ?>admin/tambahPengangguran" class="btn btn-outline-primary btn-sm btnmob" style="margin-bottom: 5px;">
      <i class="fa fa-plus"></i>
      Tambah Data
    </a>
    <div class="table-responsive"> 
      <table class="table table-hover" style="width: 100%">
        <thead class="bg-primary text-dark">
          <tr>
            <th>No.</th>
            <th>Tahun</th>
            <th>Jumlah</th>
            <th>Pilihan</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($query_pengangguran->result() as $a) { ?>
          <tr>
            <td class="no"><?php echo $no++; ?></td>
            <td><?php echo $a->TAHUN; ?></td>
            <td><?php echo $a->JUMLAH; ?></td>
            <td class="text-center">
              <?php echo anchor('admin/editPengangguran/'.$a->ID_PENGANGGURAN,'<btn class="btn btn-success text-light btn-sm">
                <i class="fa fa-edit"></i> <span class="btnm">Edit</span>
                </btn>'); ?>
              <a href="<?=base_url()?>admin/hapusPengangguran/<?=$a->ID_PENGANGGURAN?>" 
                class="btn btn-danger text-light btn-sm" onclick="return confirm('Yakin Hapus ?')">
                <i class="fa fa-trash"></i> <span class="btnm">Hapus</span>
              </a>
            </td>
          </tr>
          <?php  } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>