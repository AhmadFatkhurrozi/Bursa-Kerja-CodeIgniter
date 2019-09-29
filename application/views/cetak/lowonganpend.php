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
	    <h2 align="center"><u>Jumlah Kuota Lowongan Berdasarkan Tingkat Pendidikan</u></h2>
	     
	      <div> 
	        <table>
	          <tbody>
	            <tr>
	              <td>Tanpa Syarat Pendidikan</td>
	              <td>:</td>
	              <td><?php if($null[0]->total==''){echo "0";}else{ echo $null[0]->total;}; ?> Kuota</td>
	            </tr>
	            <tr>
	              <td>SMP/ MTS</td>
	              <td>:</td>
	              <td><?php if($smp[0]->total==''){echo "0";}else{ echo $smp[0]->total;}; ?> Kuota</td>
	            </tr>
	            <tr>
	              <td>SMA/ SMK</td>
	              <td>:</td>
	              <td><?php if($sma[0]->total==''){echo "0";}else{ echo $sma[0]->total;}; ?> Kuota</td>
	            </tr>
	            <tr>
	              <td>D3/ S1/ S2</td>
	              <td>:</td>
	              <td><?php if($sarjana[0]->total==''){echo "0";}else{ echo $sarjana[0]->total;}; ?> Kuota</td>
	            </tr>
	          </tbody>
	        </table>
	      </div>
	      
	</div>

  </body>
</html>