<script type="text/javascript">
    var cordx = [];
    var cordx_list = [];
</script>
<div class="container-fluid full-height">
    <div class="row row-height">
        <div id="keterangan" class="col-md-3 col-lg-3 col-sm-3 col-xs-6">
            <div>
                <ul>
                    <?php foreach ($data_fasilitas as $rows) : ?>
                        <!--  <li><?//= $rows->nama_fasilitas?></li>-->
                        <script type="text/javascript">
                            cordx_list.push({
                                'alamat': "<?= $rows->alamat ?>",
                                'kordinat_lng': <?= $rows->longitude ?>,
                                'kordinat_lat': <?= $rows->latitude ?>,
                                'nama_wisata': "<?= $rows->nama_fasilitas ?>",
                                'deskripsi': "<?= $rows->deskripsi ?>",
                                'icon': "<?= $rows->icon ?>",
                                'imgs': "<?= $rows->gambar_fasilitas ?>"
                            });
                        </script>
                    <?php endforeach; ?>
                    <?php foreach ($data_wisata_by_nama as $row) : ?>
                        <!--  <li><?//= $row->nama_wisata?></li>-->
                        <script type="text/javascript">
                            cordx.push({
                                'alamat': "<?= $row->alamat_wisata ?>",
                                'kordinat_lng': <?= $row->longitude ?>,
                                'kordinat_lat': <?= $row->latitude ?>,
                                'nama_wisata': "<?= $row->nama_wisata ?>",
                                'deskripsi': "<?= $row->des_wisata ?>",
                                'icon': "<?= $row->iconx ?>",
                                'kontak': "<?= $row->kontak ?>",
                                'imgs': "<?= $row->id_gambar ?>",
                                'buka': "<?= $row->buka ?>",
                                'tutup': "<?= $row->tutup ?>"
                            });
                        </script>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php foreach ($data_fasilitas as $rows) : ?>
            <script type="text/javascript">
                cordx.push({
                    'alamat': "<?= $rows->alamat ?>",
                    'kordinat_lng': <?= $rows->longitude ?>,
                    'kordinat_lat': <?= $rows->latitude ?>,
                    'nama_wisata': "<?= $rows->nama_fasilitas ?>",
                    'deskripsi': "<?= $rows->deskripsi ?>",
                    'icon': "<?= $rows->icon ?>",
                    'kontak': "-",
                    'imgs': "<?= $rows->gambar_fasilitas ?>"
                });
            </script>
        <?php endforeach; ?>
        <?php foreach ($data_wisata_by_nama as $row) : ?>
            <script type="text/javascript">
                cordx.push({
                    'alamat': "<?= $row->alamat_wisata ?>",
                    'kordinat_lng': <?= $row->longitude ?>,
                    'kordinat_lat': <?= $row->latitude ?>,
                    'nama_wisata': "<?= $row->nama_wisata ?>",
                    'deskripsi': "<?= $row->des_wisata ?>",
                    'icon': "<?= $row->iconx ?>",
                    'kontak': "<?= $row->kontak ?>",
                    'imgs': "<?= $row->id_gambar ?>",
                    'buka': "<?= $row->buka ?>",
                    'tutup': "<?= $row->tutup ?>"
                });
            </script>
        <?php endforeach; ?>
        <div class="map col-lg-12 col-md-12 col-sm-12 col-xs-12" id="maps" style="height: 100%;"></div>
        <div style="position: fixed;margin-top:100px;margin-left:20px;">
            <button class="btn btn-primary" id="btnRekomendasi">Rekomendasi</button>
            <div class="card" style="background-color: white;margin-top:10px;display:none;" id="resRekomendasi">
                <div class="card-body" style="padding:10px;">
                    <h3>Daftar Rekomendasi</h3>
                    <div id="resTextRekomendasi">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End row-->
</div>
<!-- End container-fluid -->
<script src="<?= base_url('asset/user_/') ?>js/jquery-2.2.4.min.js"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v3.1.3/mapbox-gl-directions.js'></script>
<script src='https://unpkg.com/@turf/turf/turf.min.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v3.1.3/mapbox-gl-directions.css' type='text/css' />
<script type="text/javascript">
    $("header").attr("id", "plain");
    $("footer").addClass("hidden-lg hidden-md hidden-sm");
    $(".map").css({
        "position": "fixed",
        "height": "100%"
    });
</script>
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZWZoYWwiLCJhIjoiY2ptOXRiZ3k2MDh4bzNrbnljMjk5Z2d5aSJ9.8dSNgeAjpdTlZ3x-b2vsog';
    var map = new mapboxgl.Map({
        container: 'maps',
        style: 'mapbox://styles/mapbox/streets-v10',
        center: [118.72360371534046, -8.454855097885869],
        zoom: 15
    });
    map.addControl(new mapboxgl.NavigationControl(), 'bottom-left');
    map.addControl(new mapboxgl.FullscreenControl(), 'bottom-left');
    map.addControl(new MapboxDirections({
        accessToken: mapboxgl.accessToken
    }), 'bottom-right');
    var test = [];
    cordx.forEach(function(index) {
        test.push(JSON.parse('{"type": "Feature", "geometry": {"type": "Point", "coordinates": [' + index.kordinat_lng + ',' + index.kordinat_lat + ']},"properties": {"title": "' + index.nama_wisata + '","description": "' + index.deskripsi + '","icon":"' + index.icon + '","kontak":"' + index.kontak + '","img":"' + index.imgs + '","alamat":"' + index.alamat + '","buka":"' + index.buka + '","tutup":"' + index.tutup + '"}}'));
    });

    var a = {

        "id": "symbols",
        "type": "symbol",
        "source": {
            "type": "geojson",
            "data": {
                "type": "FeatureCollection",
                "features": test
            }
        },
        "layout": {
            "text-field": "{title}",
            "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
            "text-offset": [-2, 0.9],
            "text-size": 12,
            "text-anchor": "top"
        }
    }
    console.log(a);

    function createPopUp(LatLng, nama_wisata, deskripsi, buka, tutup, kontak, image, alamat) {
        var popUps = document.getElementsByClassName('mapboxgl-popup');
        // Check if there is already a popup on the map and if so, remove it
        if (popUps[0]) popUps[0].remove();

        var popup = new mapboxgl.Popup({
                closeOnClick: false
            })
            .setLngLat(LatLng)
            .setHTML('<div id=\'marker-info\' class=\'marker-info\'>' + '<img style=\'width:100%;border-top-left-radius:7px;border-top-right-radius:7px;\' src="<?= base_url('uploads/') ?>' + image + '" alt=""><span>' + '<h3>' + nama_wisata + '</h3>' +
                '<em>' + deskripsi + '</em><strong>' + alamat + '</strong><p style=\'margin : 5px;\'><em style=\'color:white;\'>Buka ' + buka + ' - Tutup ' + tutup + '</em><a href="tel://' + kontak + '" class="btn_infobox_phone">+' + kontak + '</a></p><span></div>')
            .addTo(map);
    }
    map.on('load', function() {
        // Add a symbol layer.
        map.addLayer(a);

        // Center the map on the coordinates of any clicked symbol from the 'symbols' layer.
        map.on('click', 'symbols', function(e) {
            map.flyTo({
                center: e.features[0].geometry.coordinates,
                zoom: 16
            });
            createPopUp(e.features[0].geometry.coordinates, e.features[0].properties.title, e.features[0].properties.description, e.features[0].properties.buka, e.features[0].properties.tutup, e.features[0].properties.kontak, e.features[0].properties.img, e.features[0].properties.alamat);
            $("#keterangan").show();
            console.log(e.features);

        });

        // Change the cursor to a pointer when the it enters a feature in the 'symbols' layer.
        map.on('mouseenter', 'symbols', function() {
            map.getCanvas().style.cursor = 'pointer';
        });

        // Change it back to a pointer when it leaves.
        map.on('mouseleave', 'symbols', function() {
            map.getCanvas().style.cursor = '';
        });


    });

    console.log(a);

    a.source.data.features.forEach(function(marker) {

        // create a HTML element for each feature
        var el = document.createElement('i');
        el.className = 'marker ' + marker.properties.icon;

        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el)
            .setLngLat(marker.geometry.coordinates)
            .addTo(map);
    });

    function onHtmlClick(a, b) {
        map.flyTo({
            center: [a, b]
        });
        map.zoom = 17;
    }

    //remove property
</script>
<script>
    btnRekomendasi = document.getElementById("btnRekomendasi");
    resRekomendasi = document.getElementById("resRekomendasi");
    resTextRekomendasi = document.getElementById("resTextRekomendasi");

    let clientCordinate;
    let jsonParse = [];

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        clientCordinate = {
            'lat': position.coords.latitude,
            'lng': position.coords.longitude
        };
    }

    function showRekomendasi(data) {
        data = data.slice(0, 3);
        html = '';
        data.forEach(function(i, v) {
            html += `<img class="img-fluid" style="width:50px;height:50px;" src="<?= base_url('uploads/') ?>${i.data.id_gambar}">`
            html += `<h3><a href=<?= site_url('User/detail_wisata/') ?>${i.data.id_wisata}>${i.data.nama_wisata}</a></h1><br/>`
            html += `<p>${i.data.deskripsi}</p><br/>`
        });
        resTextRekomendasi.innerHTML = html;
        console.log(html);

    }
    btnRekomendasi.onclick = () => {
        getLocation();
        var datas = [];
        resRekomendasi.style.display = null
        // Tampilkan rekomendasi wisata terdekat sebanyak 3 buah
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?= site_url('User/getDataWisata') ?>');
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = () => {
            if (xhr.readyState == 4 && xhr.status == 200) {
                jsonParse = JSON.parse(xhr.responseText);
                arr = jsonParse.map((data) => {
                    distance = turf.distance(turf.point([clientCordinate.lat, clientCordinate.lng]), turf.point([data.latitude, data.longitude]), {
                        units: 'kilometers'
                    });
                    return {
                        'data': data,
                        'distance': distance
                    }
                });

                datas = arr.sort(function(a, b) {
                    return a.distance - b.distance
                });
                showRekomendasi(datas);
            }

        }

        xhr.send()
    }
</script>