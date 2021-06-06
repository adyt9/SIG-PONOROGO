	   <?php foreach($data_agenda as $row):?>
	 <section class="parallax_window_in" data-parallax="scroll" data-image-src="<?= base_url('asset/plugins/images/')?>login-register.jpg" data-natural-width="1400" data-natural-height="800" style="Object-fit:cover;">
        <div id="sub_content_in">
            <h1><?= $row->judul_agenda;?></h1>
        </div>
        <!-- End sub_content -->
    </section>
	<script type="text/javascript">
		var cordx = [];
	</script>
    <div class="container margin_60">
        <div class="row">
            <div class="col-md-8 col-xs-12 col-md-push-2">
                <div class="box_style_general add_bottom_30">
                    <!--End row -->
                
               
                  <h1><?= $row->judul_agenda;?></h1><hr>
                    <div class="img_wrapper">
                            <!-- End tool_i -->
                            <div class="img_container">
                                <a href="<?= site_url('User/detail_wisata/').$row->id_agenda;?>">
                                    <img src="<?= base_url('image/').$row->gambar;?>" width="800" style="object-fit: cover;height: 250px;" class="img-responsive" alt="">
                                    <div class="short_info">
                                        <h3><?= $row->judul_agenda;?></h3>
                                        <p>
                                            Latitude : <?= $row->latitude;?>,Longitude : <?= $row->longitude;?><br>Alamat :<?= $row->alamat?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        
                        </div>
                        <h3>Peta</h3>
                        <div id="map" style="width: 100%;height: 200px;"></div>
                    <p class="">
                        <?= $row->alamat;?> (<?= $row->longitude?>,<?= $row->latitude?>)
                    </p>
                        
                    <script type="text/javascript">
                    cordx.push({'kordinat_lng': <?= $row->longitude?>,'kordinat_lat':<?= $row->latitude?>,'nama_wisata':"<?= $row->judul_agenda?>",'deskripsi':"<?= $row->deskripsi?>",'icon':"circle"});
                    </script>
                      <div class="col-md-12">
                            <div class="box_info">
                                <h3>Jadwal</h3>
                                <ul>
                                    <li><strong><?php if($row->waktu_mulai != ''){echo 'Buka '.$row->waktu_mulai;}?><?php if($row->waktu_selesai != ''){echo ' - Tutup '.$row->waktu_selesai;}?> </strong></li>
                                    <li><strong>Tanggal </strong><?= $row->tanggal_mulai;?> - <?= $row->tanggal_berakhir;?></li>
                                </ul>
                            </div>
                    </div>
                    <h3>Deskripsi Singkat</h3>
                    <p class="">
                        <?= $row->deskripsi;?>
                    </p>
                    <hr>
                </div>
                    <?php endforeach;?>
            </div>
            <!-- End col lg-9 -->
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->
    <script src="<?= base_url('asset/user_/')?>js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
		$("header").attr("id","plain");
	</script>
	<script type="text/javascript">
		
        mapboxgl.accessToken = 'pk.eyJ1IjoiZWZoYWwiLCJhIjoiY2ptOXRiZ3k2MDh4bzNrbnljMjk5Z2d5aSJ9.8dSNgeAjpdTlZ3x-b2vsog';
        var map = new mapboxgl.Map({
            container: 'map', // container id
            style: 'mapbox://styles/mapbox/streets-v9', // stylesheet location
            center: [cordx[0].kordinat_lng,cordx[0].kordinat_lat], // starting position [lng, lat]
            zoom: 16 // starting zoom
        });
        /*  */
            var test = [];
			cordx.forEach(function(index){
                test.push(JSON.parse('{"type": "Feature", "geometry": {"type": "Point", "coordinates": ['+index.kordinat_lng+','+index.kordinat_lat+']},"properties": {"title": "'+index.nama_wisata+'","description": "<b>'+index.nama_wisata+'</b><p>'+index.deskripsi+'</p>","icon":"circle"}}'));
			});

        map.on('load', function() {
        	 map.addLayer({
        	        "id": "points",
        	        "type": "symbol",
        	        "source": {
        	            "type": "geojson",
        	            "data": {
        	                "type": "FeatureCollection",
        	                "features": test
        	            }
        	        },
        	        "layout": {
        	            "icon-image": "{icon}-15",
        	            "text-field": "{title}",
        	            "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
        	            "text-offset": [0, 0.6],
        	            "text-anchor": "top"
        	        }
        	    });
        });

        // Create a popup, but don't add it to the map yet.
        var popup = new mapboxgl.Popup({offset: 25});

        map.on('click', 'points', function(e) {
            // Change the cursor style as a UI indicator.
            map.getCanvas().style.cursor = 'pointer';

            var coordinates = e.features[0].geometry.coordinates.slice();
            var description = e.features[0].properties.description;

            // Ensure that if the map is zoomed out such that multiple
            // copies of the feature are visible, the popup appears
            // over the copy being pointed to.
            while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
            }

            // Populate the popup and set its coordinates
            // based on the feature found.
            popup.setLngLat(coordinates)
                .setHTML(description)
                .addTo(map);
        });
        
        /*  */
        </script>