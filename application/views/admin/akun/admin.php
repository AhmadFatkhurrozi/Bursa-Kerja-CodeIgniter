<ol class="breadcrumb">
    <h6 class="breadcrumb-item">
      <i class="fa fa-home"></i>
      <a href="<?=base_url()?>admin">Dashboard</a>
    </h6>
    <h6 class="breadcrumb-item active">Data Admin</h6>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <h5>
      <i class="fa fa-table"></i>
      <span>Data Admin</span>
    </h5>
  </div>
  <form>
    <div class="card-body">
      <a href="<?php echo base_url() ?>admin/tambahAdmin" class="btn btn-outline-primary btnmob btn-sm" style="margin-bottom: 5px;">
        <i class="fa fa-plus"></i>
        Tambah Data
      </a>
      <button type="submit" formaction="<?php echo base_url() ?>admin/aktifkan_admin" formmethod="POST" class="btn btn-outline-success btnmob btn-sm" style="margin-bottom: 5px;">
        <span>Aktifkan Terpilih</span>
      </button>
      <button type="submit" formaction="<?php echo base_url() ?>admin/nonaktifkan_admin" formmethod="POST" class="btn btn-danger btnmob btn-sm" style="margin-bottom: 5px;">
        <span>Nonaktifkan Terpilih</span>
      </button>

      <div class="table-responsive"> 
        <table class="table table-hover" style="width: 100%">
          <thead class="bg-primary text-dark">
            <tr>
              <th><input id="checkAll" type="checkbox"></th>
              <th>No</th>
              <th>Nama</th>
              <th>Telepon</th>
              <th>Email</th>
              <th>Dibuat Pada</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($query_admin->result() as $a) { ?>
            <tr>
              <td class="no"><input type="checkbox" name="pilih[]" value="<?php echo $a->ID_USER; ?>"></td>
              <td class="no"><?php echo $no++; ?></td>
              <td><?php echo $a->NAMA_ADMIN; ?></td>
              <td><?php echo $a->TELEPON; ?></td>
              <td><?php echo $a->EMAIL; ?></td>
              <td><?php echo mediumdate_indo($a->DIBUAT_PADA);?></td>
              <td>
                <span class="badge badge-<?php echo ( $a->STATUS == 'NONAKTIF' )? 'danger' : 'success' ?>"><?php echo $a->STATUS; ?></span>
              </td>
            </tr>
            <?php  } ?>
          </tbody>
        </table>
      </div>
    </div>
  </form>
 
</div>