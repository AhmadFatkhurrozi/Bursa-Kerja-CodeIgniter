<div>
  <h4><i class="fa fa-history"></i><span> Keahlian</span></h4>
</div>

<hr>

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<br>

<div class="row">
  <div class="col-md-12 alert alert-dark"> 
    <a href="<?php echo base_url()?>pencaker/tambahSkill" class="btn btn-primary btn-sm">
      <i class="fa fa-plus"></i> Tambah Data
    </a><br><br>
    <?php foreach ($query_keahlian->result() as $a) { ?>
    <table class="table table-info text-dark alert alert-info">
      <tbody>
        <tr>
          <td><b>Bidang Keahlian</b></td>
          <td><?php echo $a->BIDANG_KEAHLIAN; ?></td>
        </tr>
        <tr>
          <td><b>Deskripsi</b></td>
          <td><?php echo $a->DESKRIPSI_KEAHLIAN; ?></td>
        </tr>
         <tr>
          <td><b>Lampiran</b></td>
          <td>
            <a href="<?=base_url()?>dist/img/pencaker/keahlian/<?=$a->LAMPIRAN;?>">
               <?php echo $a->LAMPIRAN; ?>
            </a>
          </td>
        </tr>
        <tr class="text-center">
          <td colspan="2">
            <div class="btn-group">
              <a href="<?=base_url()?>pencaker/editSkill/<?=$a->ID_KEAHLIAN;?>" class="btn btn-success text-light btn-sm">
                <i class="fa fa-edit"></i>
                <span class="btnm">Edit</span>
              </a>
              <a href="<?=base_url()?>pencaker/hapusSkill/<?=$a->ID_KEAHLIAN;?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger text-light btn-sm">
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