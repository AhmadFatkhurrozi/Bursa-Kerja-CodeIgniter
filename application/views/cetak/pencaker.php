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
	    <h2 align="center"><u>Pencaker Terdaftar</u></h2>
	     
	      <div> 
	        <table border="1" align="center">
	          <thead style="background-color: lightblue;">
	            <tr>
	              <th><b>No.</b></th>
	              <th><b>Nama Pencaker</b></th>
	              <th><b>NIK</b></th>
	              <th><b>Status</b></th>
	              <th><b>Dibuat Pada</b></th>
	            </tr>
	          </thead>
	          <tbody>
	            <?php $no=1; foreach( $query_pencaker->result() as $a ){ ?>
	            <tr>
	              <td><?php echo $no++; ?></td>
	              <td><?php echo $a->NAMA_PENCAKER; ?></td>
	              <td><?php echo $a->NIK; ?></td>
	              <td><?php echo $a->STATUS; ?></td>
	              <td><?php echo mediumdate_indo($a->DIBUAT_PADA); ?></td>
	            </tr>
	          <?php } ?>
	          </tbody>
	        </table>
	      </div>
	      
	</div>

  </body>
</html>