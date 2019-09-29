<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./dist/img/icon.png">
    <title>Sistem Informasi Bursa Kerja</title>
    <style>
      table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
          font-size: 12px;
      }
      thead {
        background-color: royalblue;
      }

      td, th {
          text-align: left;
          padding: 5px;
      }

      tr:nth-child(even) {
          background-color: #dddddd;
      }
      .pdf{
        background-color: yellow;
        padding: 10px 5px;
      }
    </style>
  </head>
  <body>
     
  <div style="padding: 5px 50px;">

    <div align="center">
      <h2>Sistem Informasi Bursa Kerja (SIBUK)<br>
      Dinas Tenaga Kerja Kabupaten Jombang</h2>
      <p>
          Jl. KH. Wahid Hasyim No.175, Kepanjen, Kec. Jombang, Kabupaten Jombang,
          <br>Jawa Timur 61411
      </p>
    </div>
    
    <hr>
    <h2 align="center"><u>Curriculum Vitae Pencaker</u></h2>
      <div style="padding: 0px 20px;">
          <h3>Profil Pencaker</h3>
          <table>
            <tbody>
              <?php foreach( $query_pencaker as $a ){ ?>
              <tr align="center">
                <td rowspan="10">
                   <img alt="User Picture" src="dist/img/pencaker/<?=$a->FOTO;?>" width="150" >
                </td>
              </tr>
              <tr>
                <td><b>NIK</b></td>
                <td>:</td>
                <td><?=$a->NIK;?></td>
              </tr>
              <tr>
                <td><b>Nama</b></td>
                <td>:</td>
                <td><?=$a->NAMA_PENCAKER;?></td>
              </tr>
              <tr>
                <td><b>Jenis Kelamin</b></td>
                <td>:</td>
                <td><?=$a->JK;?></td>
              </tr>
              <tr>
                <td><b>TTL</b></td>
                <td>:</td>
                <td><?=$a->TEMPAT_LAHIR;?>,
                    <?=mediumdate_indo($a->TGL_LAHIR);?>
                </td>
              </tr>
              <tr>
                <td><b>Status</b></td>
                <td>:</td>
                <td><?=$a->STATUS_KAWIN;?></td>
              </tr>
              <tr>
                <td><b>Agama</b></td>
                <td>:</td>
                <td><?=$a->AGAMA;?></td>
              </tr>
              <tr>
                <td><b>Email</b></td>
                <td>:</td>
                <td><?=$a->EMAIL;?></td>
              </tr>
              <tr>
                <td><b>Telepon</b></td>
                <td>:</td>
                <td><?=$a->TELEPON;?></td>
              </tr>
              <tr>
                <td><b>Alamat</b></td>
                <td>:</td>
                <td><?=$a->ALAMAT;?></td>
              </tr>
              <?php } ?>
               </tbody>
          </table>
      </div>
      
      <br>
      <h3><b> Riwayat Pendidikan</b></h3>
      <br>

      <div> 
        <table border="1" align="center">
          <thead style="background-color: lightblue;">
            <tr>
              <th><b>Tingkat Pendidikan</b></th>
              <th><b>Nama Sekolah</b></th>
              <th><b>Jurusan</b></th>
              <th><b>Alamat Sekolah</b></th>
              <th><b>Masuk</b></th>
              <th><b>Lulus</b></th>
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
              <td><a href="<?=base_url()?>dist/img/pencaker/pendidikan/<?=$a->LAMPIRAN;?>"><?php echo $a->LAMPIRAN; ?></a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>

      <br>
        <h3><b> Pengalaman Kerja</b></h3>
      <br>

      <div> 
        <table border="1" align="center">
          <thead style="background-color: lightblue;">
            <tr>
              <th><b>Nama Perusahaan</b></th>
              <th><b>Jabatan</b></th>
              <th><b>Deskripsi Jabatan</b></th>
              <th><b>Bidang</b></th>
              <th><b>Masuk</b></th>
              <th><b>Keluar</b></th>
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
              <td><?php echo shortdate_indo($a->TGL_MASUK); ?></td>
              <td><?php echo shortdate_indo($a->TGL_KELUAR); ?></td>
              <td><a href="<?=base_url()?>dist/img/pencaker/pengalaman/<?=$a->LAMPIRAN;?>"><?php echo $a->LAMPIRAN; ?></a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>

      <br>
        <h3><b> Keahlian</b></h3>
      <br>

      <div> 
        <table border="1" align="center">
          <thead style="background-color: lightblue;">
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
              <td><a href="<?=base_url()?>dist/img/pencaker/keahlian/<?=$a->LAMPIRAN;?>"><?php echo $a->LAMPIRAN; ?></a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>

      <br>
        <h3><b> History Lamaran</b></h3>
      <br>

      <div> 
        <table border="1" align="center">
          <thead style="background-color: lightblue;">
            <tr>
              <th><b>No.</b></th>
              <th><b>Lowongan</b></th>
              <th><b>Perusahaan</b></th>
              <th><b>Tanggal</b></th>
              <th><b>Status</b></th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; ?>
              <?php foreach ($query_history as $a) { ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?=$a->JUDUL; ?></td>
                <td><?=$a->NAMA_PERUSAHAAN;?></td>
                <td><i><?=shortdate_indo($a->TGL_BID);?></i></td>
                <td><?=$a->STATUS_HISTORY?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <br>
         <h2 align="center"><u>Lampiran</u></h2>
      <br>

      <?php foreach ($query_pencaker as $a) { ?>
        <div align="center">
          <img src="dist/img/pencaker/ktp/<?=$a->FOTO_KTP;?>" height="150" >
          <br>
          <i><b>Foto KTP</i>
        </div>
        <br>
        <br>
      <?php } ?>

      <?php foreach ($query_pendidikan as $a) { ?>
        <div align="center">
          <?php 
            $pend = $this->db->like('LAMPIRAN', 'pdf', 'BOTH')
                             ->get('pendidikan');
            if ($pend->num_rows() > 0 ) { ?>
               <div class="pdf">
                 Untuk lampiran dalam bentuk PDF, silahkan dicetak pada kolom masing-masing.
               </div>
            <?php } else { ?>               
            
            <img width="600" src="dist/img/pencaker/pendidikan/<?=$a->LAMPIRAN;?>">

            <?php } ?>
          <br>
          <i><b><?=$a->LAMPIRAN?></b></i>
        </div>
        <br>
        <br>
      <?php } ?>

      <?php foreach ($query_pengalaman as $a) { ?>
        <div align="center">
          <img width="600" src="dist/img/pencaker/pengalaman/<?=$a->LAMPIRAN;?>">
          <br>
          <i><b><?=$a->LAMPIRAN?></b></i>
        </div>
        <br>
        <br>
      <?php } ?>

       <?php foreach ($query_skill as $a) { ?>
        <div align="center">
          <img width="600" src="dist/img/pencaker/keahlian/<?=$a->LAMPIRAN;?>">
          <br>
          <i><b><?=$a->LAMPIRAN?></b></i>
        </div>
        <br>
        <br>
      <?php } ?>

  </div>

  </body>
</html>