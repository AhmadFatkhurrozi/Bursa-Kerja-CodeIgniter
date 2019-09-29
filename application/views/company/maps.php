<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="./dist/img/icon.png">
  <title>Sistem Informasi Bursa Kerja</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css' rel='stylesheet' />
    <style>
       
        #map { position:relative; top:0; bottom:0; width:900px; height:500px; }
    </style>
    <?php 
        echo __css('bootstrap');
        echo __css('fontawesome');
        echo __css('sibuk');
        echo __js('jquery'); 
    ?>
</head>
 <body>
    	<?php echo $header; ?>
    	<div class="container" style="padding-top: 70px;">
    		<div class="row">
    			<div class="col-md-9 bg-light" style="padding-bottom: 10px;">
    				<h3 style="padding: 15px 4px">Lokasi Perusahaan</h3>
    				<div id='map'></div>
    			</div>
    			<div class="col-md-3 bg-light" style="padding-top: 40px;">
                    <form action="<?=base_url()?>company/ubahMaps" method="POST">
                    	<div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="lat" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="long" class="form-control" readonly="">
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                    </form>
    			</div>
    		</div>
    	</div>

        <?php echo $footer; ?>

<!-- <pre id='coordinates' class='coordinates'></pre> -->

<script>
mapboxgl.accessToken = 'pk.eyJ1Ijoia2Frcm96IiwiYSI6ImNqcmVlYWVtaTBrbGk0M2tiZmw0c2d6eTkifQ.IcfAOzGtH-wm_r6hg4YCxA';
// var coordinates = document.getElementById('coordinates');
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v9',
    center: [110.87764261675511, -7.726757854914084 ],
    zoom: 5
});

var marker = new mapboxgl.Marker({
    draggable: true
})
    .setLngLat( [110.87764261675511, -7.726757854914084 ])
    .addTo(map);

function onDragEnd() {
    var lngLat = marker.getLngLat();
    // coordinates.style.display = 'block';
    $('input[name=lat]').val(lngLat.lat);
    $('input[name=long]').val(lngLat.lng);
    // coordinates.innerHTML = 'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
}

marker.on('dragend', onDragEnd);
</script>
 <?php
        echo __js('bootstrap');
     ?>
</body>
</html>