<ol class="breadcrumb">
    <h6 class="breadcrumb-item">
      <i class="fa fa-home"></i>
      <a href="<?=base_url()?>admin">Dashboard</a>
    </h6>
    <h6 class="breadcrumb-item active">Data Pencaker</h6>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <h5>
      <i class="fa fa-table"></i>
      <span>Data Pencaker</span>
    </h5>
  </div>
  <form>
  <div class="card-body">
    <button type="submit" formaction="<?php echo base_url() ?>admin/aktifkanPencaker" formmethod="POST" class="btn btn-outline-success btnmob btn-sm" style="margin-bottom: 5px;">
      <span>Aktifkan Terpilih</span>
    </button>
    <button type="submit" formaction="<?php echo base_url() ?>admin/bekukanPencaker" formmethod="POST" class="btn btn-danger btnmob btn-sm" style="margin-bottom: 5px;">
      <span>Bekukan Terpilih</span>
    </button>
    <div class="table-responsive"> 
      <table class="table table-hover" style="width: 100%">
        <thead class="bg-primary text-dark">
          <tr>
            <th><input id="checkAll" type="checkbox"></th>
            <th>No.</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Agama</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($query_pencaker->result() as $a) { ?>
          <tr>
            <td class="no"><input type="checkbox" name="pilih[]" value="<?php echo $a->ID_USER; ?>"></td>
            <td class="no"><?php echo $no++; ?></td>
            <td>
               <a href="<?=base_url()?>admin/detailPenc/<?=$a->ID_PENCAKER;?>"><?php echo $a->NAMA_PENCAKER; ?></a>
            </td>
            <td><?php echo $a->JK; ?></td>
            <td><?php echo $a->AGAMA; ?></td>
            <td><?php echo $a->TELEPON; ?></td>
            <td><?php echo $a->EMAIL; ?></td>
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

<!-- <div class="modal fade" id="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fa fa-info" style="background-color: orange; color: white; padding: 3px 10px; border-radius: 50%;"></i> Detail Pencaker
        </h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="fetched-data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div> -->