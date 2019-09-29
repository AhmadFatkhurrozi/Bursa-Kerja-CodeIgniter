 <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.js'></script>
  <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css' rel='stylesheet' />
    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:99%; height: 400px; }
    </style>
<style>
.btn-gbr{
        height: 30px;
      }
</style>
<ol class="breadcrumb">
    <h6 class="breadcrumb-item">
      <i class="fa fa-home"></i>
      <a href="<?=base_url()?>admin">Dashboard</a>
    </h6>
    <h6 class="breadcrumb-item active"> Lokasi Perusahaan</h6>
</ol>

<div class="card mb-3">
  <div class="card-header">
      <h5>
        <i class="fa fa-suitcase"></i>
        <span>Lokasi Perusahaan <?=$company->NAMA_PERUSAHAAN;?></span>
      </h5>
  </div>

  <div class="body" style="height: 400px">
    <div class="row">
      <div class="col-md-12">  
        <div id='map'></div>
      </div>
    </div>
  </div>
</div>
<hr>
  <a href="<?php echo base_url();?>admin/addLowongan" class="btn btn-light">Kembali</a>

<script src='https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js'></script>
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
<script>
mapboxgl.accessToken = 'pk.eyJ1Ijoia2Frcm96IiwiYSI6ImNqcmVlYWVtaTBrbGk0M2tiZmw0c2d6eTkifQ.IcfAOzGtH-wm_r6hg4YCxA';
// eslint-disable-next-line no-undef
var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
mapboxClient.geocoding.forwardGeocode({
    query: 'Wellington, New Zealand',
    autocomplete: false,
    limit: 1
})
    .send()
    .then(function (response) {
        if (response && response.body && response.body.features && response.body.features.length) {
            var feature = response.body.features[0];

            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v9',
                center: [<?=$company->LONG_KOORDINAT.','.$company->LAT_KOORDINAT ?>],
                zoom: 17
            });
            new mapboxgl.Marker()
                .setLngLat([<?=$company->LONG_KOORDINAT.','.$company->LAT_KOORDINAT ?>])
                .addTo(map);
        }
    });

</script>