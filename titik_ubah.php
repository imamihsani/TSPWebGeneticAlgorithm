<?php
$row = $db->get_row("SELECT * FROM tb_titik WHERE kode_titik='$_GET[ID]'");
?>
<div class="page-header">
    <h1 style="color:black">Ubah Titik</h1>
</div>
<?php if ($_POST) include 'aksi.php' ?>
<form method="post" action="?m=titik_ubah&ID=<?= $row->kode_titik ?>">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Kelompok <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_kelompok">
                    <?= get_kelompok_option(set_value('kode_kelompok', $row->kode_kelompok)) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode"  value="<?= $row->kode_titik ?>" />
            </div>
            <div class="form-group">
                <label>Nama Titik <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?= $row->nama_titik ?>" id="nama" />
            </div>
            <div class="form-group">
                <label>Latitude <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="lat" id="lat" value="<?= set_value('lat', $row->lat) ?>" />
            </div>
            <div class="form-group">
                <label>Longitude <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="lng" name="lng" value="<?= set_value('lng', $row->lng) ?>"  />
            </div>
            <div class="form-group">
                <label>Penerima <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="penerima" name="penerima" value="<?= set_value('penerima', $row->penerima) ?>"  />
            </div>
            <div class="form-group">
                <label>No. Telepon <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="notelp" name="notelp" value="<?= set_value('notelp', $row->notelp) ?>"  />
            </div>

            <div class="form-group">
                <button class="btn btn-warning"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=titik"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input class="form-control" type="text" id="pac-input" placeholder="Cari lokasi" />
            </div>
            <div id="map" style="height: 400px;"></div>
        </div>
    </div>
</form>
<script>
    var defaultCenter = {
        lat: <?= set_value('lat', $row->lat) * 1 ?>,
        lng: <?= set_value('lng', $row->lng) * 1 ?>
    };

    function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: <?= get_option('default_zoom') ?>,
            center: defaultCenter
        });

        var marker = new google.maps.Marker({
            position: defaultCenter,
            map: map,
            title: 'Click to zoom',
            draggable: true
        });

        var input = document.getElementById('pac-input');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        marker.addListener('drag', handleEvent);
        marker.addListener('dragend', handleEvent);

        var infowindow = new google.maps.InfoWindow({
            content: '<h4>Lokasi Yang Disorot</h4>'
        });

        infowindow.open(map, marker);
        var infowindowContent = document.getElementById('infowindow-content');

        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17); // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            document.getElementById('nama').value = place.name;
            document.getElementById('lat').value = place.geometry.location.lat();
            document.getElementById('lng').value = place.geometry.location.lng();

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindow.setContent(place.name + '');
            infowindow.open(map, marker);
        });
    }

    function handleEvent(event) {
        document.getElementById('lat').value = event.latLng.lat();
        document.getElementById('lng').value = event.latLng.lng();
    }

    $(function() {
        initMap();
    })
</script>