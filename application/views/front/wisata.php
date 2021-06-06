<!DOCTYPE html>
<html>
<link href="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>
<?php $this->load->view('front/head') ?>

<body class="top-navigation">
	<script type="text/javascript">
		var cordx = [];
	</script>
	<div id="wrapper">
		<div id="page-wrapper" class="white-bg">
			<div class="row border-bottom white-bg">
				<?php $this->load->view('front/nav') ?>

			</div>
			<div class="container">
				<div class="row" style="margin-top: 50px;">
					<div class="col-md-6">
						<div class="main_title">
							<h2>Data <strong>Wisata</strong></h2>
							<p><?= $text_cover[1] ?></p>
						</div>

						<?php foreach ($data_wisata_by_nama as $row) : ?>
							<div class="col-lg-6 col-md-12 col-sm-7">
								<div class="img_wrapper">

									<div class="tools_i">
										<div class="directions_list_map" onclick="onHtmlClick('<?= $row->longitude ?>','<?= $row->latitude ?>','<?= $row->nama_wisata ?>','<?= $row->des_wisata ?>','<?= $row->buka ?>','<?= $row->tutup ?>','<?= $row->kontak ?>','<?= $row->id_gambar ?>','<?= $row->alamat_wisata ?>');return false;">
											<a class="tooltip_styled tooltip-effect-4"><span class="tooltip-item"></span>
												<div class="tooltip-content">View on map</div>
											</a>
										</div>
									</div>
									<!-- End tool_i -->
									<div class="img_container">
										<a href="<?= site_url('User/detail_wisata/') . $row->id_wisata; ?>">
											<img src="<?= base_url('uploads/') . $row->id_gambar; ?>" width="800" style="object-fit: cover;height: 200px;" class="img-responsive" alt="">
											<div class="short_info">
												<em><?= $row->nama_kategori; ?></em>
												<h3><?= $row->nama_wisata; ?></h3>
												<br />
												<em onclick="onHtmlClick('<?= $row->longitude ?>','<?= $row->latitude ?>','<?= $row->nama_wisata ?>','<?= $row->des_wisata ?>','<?= $row->buka ?>','<?= $row->tutup ?>','<?= $row->kontak ?>','<?= $row->id_gambar ?>','<?= $row->alamat_wisata ?>');return false;">lihat di peta</em>
											</div>
										</a>
									</div>
								</div>
								<!-- End img_wrapper -->
							</div>
							<script type="text/javascript">
								cordx.push({
									'kordinat_lng': <?= $row->longitude ?>,
									'kordinat_lat': <?= $row->latitude ?>,
									'nama_wisata': "<?= $row->nama_wisata ?>",
									'deskripsi': "<?= $row->deskripsi ?>",
									'icon': "<?= $row->iconx ?>"
								});
							</script>
						<?php endforeach; ?>

					</div>
					<div class="col-md-6">
						<div class="map col-lg-6 col-md-7 col-lg-push-6 col-md-push-7" id="maps" style="height: 100%;"></div>
					</div>
				</div>
			</div>
			<?php $this->load->view('front/footer') ?>
		</div>

		<?php $this->load->view('front/script') ?>
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
				center: [111.4644147, -7.8701484],
				// center: [118.72360371534046, -8.454855097885869], 111.4644147, -7.8701484
				zoom: 13
			});

			map.addControl(new mapboxgl.NavigationControl());
			map.addControl(new mapboxgl.FullscreenControl());

			var test = [];
			cordx.forEach(function(index) {
				test.push(JSON.parse('{"type": "Feature", "geometry": {"type": "Point", "coordinates": [' + index.kordinat_lng + ',' + index.kordinat_lat + ']},"properties": {"title": "' + index.nama_wisata + '","description": "<b>' + index.nama_wisata + '</b><p>' + index.deskripsi + '</p>","icon":"' + index.icon + '"}}'));
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
			map.on('load', function() {
				// Add a symbol layer.
				map.addLayer(a);

				// Center the map on the coordinates of any clicked symbol from the 'symbols' layer.
				map.on('click', 'symbols', function(e) {
					map.flyTo({
						center: e.features[0].geometry.coordinates
					});
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
			console.log(a.source.data.features);
			a.source.data.features.forEach(function(marker) {
				console.log('ini marker');
				console.log(marker);
				// create a HTML element for each feature
				/* 	  var el = document.createElement('div');
					  el.className = 'marker'; */

				var el = document.createElement('i');
				el.className = 'marker ' + marker.properties.icon;

				// make a marker for each feature and add to the map
				new mapboxgl.Marker(el)
					.setLngLat(marker.geometry.coordinates)
					.addTo(map);
			});
			if (!('remove' in Element.prototype)) {
				Element.prototype.remove = function() {
					if (this.parentNode) {
						this.parentNode.removeChild(this);
					}
				};
			}

			function createPopUp(a, b, nama_wisata, deskripsi, buka, tutup, kontak, image, alamat) {
				var popUps = document.getElementsByClassName('mapboxgl-popup');
				// Check if there is already a popup on the map and if so, remove it
				if (popUps[0]) popUps[0].remove();

				var popup = new mapboxgl.Popup({
						closeOnClick: false
					})
					.setLngLat([a, b])
					.setHTML('<div id=\'marker-info\' class=\'marker-info\'>' + '<img style=\'width:100%;border-top-left-radius:7px;border-top-right-radius:7px;\' src="<?= base_url('uploads/') ?>' + image + '" alt=""><span>' + '<h3>' + nama_wisata + '</h3>' +
						'<em>' + deskripsi + '</em><strong>' + alamat + '</strong><p style=\'margin : 5px;\'><em>Buka ' + buka + '- Tutup ' + tutup + '</em><a href="tel://' + kontak + '" class="btn_infobox_phone">+' + kontak + '</a></p><span></div>')
					.addTo(map);
			}

			function onHtmlClick(x, b, nama_wisata, des, buka, tutup, kontak, image, alamat) {
				console.log(a.source.data.features);
				createPopUp(x, b, nama_wisata, des, buka, tutup, kontak, image, alamat);
				map.flyTo({
					center: [x + 114101035, b],
					zoom: 14
				});
			}

			//remove property
		</script>
</body>

</html>
