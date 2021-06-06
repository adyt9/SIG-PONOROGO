<!DOCTYPE html>
<html>
<link href="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>
<style type="text/css">
	.marker {
		font-size: 16px;
		color: #c8497c;
	}

	/* Marker tweaks */
	.mapboxgl-popup-close-button {
		display: none;
	}

	.mapboxgl-popup-content {
		font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', Sans-serif;
		padding: 0;
		width: 272px;
		background-color: #000000e6;
		border-radius: 7px;
		position: absolute;
		bottom: -177px;
	}

	.mapboxgl-popup-tip {
		/* matrix(rotate(),translate()); */
		left: 34px;
		top: 14px;
		position: absolute;
		border-top-color: #000000e6 !important;
		-ms-transform: rotate(90deg);
		/* Support IE 9 */
		-webkit-transform: rotate(90deg);
		/* support Safari */
		transform: rotate(90deg);
		/* Standard syntax */
	}

	.mapboxgl-popup-content-wrapper {
		padding: 1%;
	}

	.mapboxgl-popup-content img {
		object-fit: cover;
		height: 150px;
	}

	.mapboxgl-ctrl-top-right {
		top: 80px;
	}

	/* .mapboxgl-popup-content h3 {
          background: #c8497c;
          color: #fff;
          margin: 0;
          display: block;
          border-radius: 3px 3px 0 0;
          font-weight: 700;
          margin-top: -15px;
        } */
	#marker-info h3,
	em,
	p,
	strong {
		padding-left: 11px;
		padding-right: 11px;
	}

	#marker-info strong {
		display: block;
	}

	.mapboxgl-popup-content {
		margin: 17px;
		left: 32px;
		color: #fff;
	}

	.mapboxgl-popup-content h3 {
		margin-bottom: 10px;
		font-size: 15px;
		text-transform: uppercase;
		font-weight: bold;
		color: white;
	}

	.mapboxgl-popup-content em {
		margin-bottom: 3px;
		color: #656565;
		display: block;
		font-size: 11px;
		top: -28px;
		line-height: 1.5;
	}

	.mapboxgl-popup-content h4 {
		margin: 0;
		display: block;
		font-weight: 400;
	}

	.mapboxgl-popup-content div {}

	.mapboxgl-container .leaflet-marker-icon {
		cursor: pointer;
	}

	.mapboxgl-popup-anchor-top>.mapboxgl-popup-content {
		margin-top: -15px;
	}

	.mapboxgl-popup-anchor-top>.mapboxgl-popup-tip {
		border-bottom-color: #fff;
		margin-top: 15px;
	}

	.mapbox-directions-route-summary h1 {
		color: white;
	}

	.map-overlay {
		font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
		position: absolute;
		width: 200px;
		top: 0;
		left: 0;
		padding: 10px;
	}

	.map-overlay .map-overlay-inner {
		background-color: #fff;
		box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		border-radius: 3px;
		padding: 10px;
		margin-bottom: 10px;
	}

	.map-overlay-inner fieldset {
		border: none;
		padding: 0;
		margin: 0 0 10px;
	}

	.map-overlay-inner fieldset:last-child {
		margin: 0;
	}

	.map-overlay-inner select {
		width: 100%;
	}

	.map-overlay-inner p {
		margin: 0;
	}

	.map-overlay-inner label {
		display: block;
		font-weight: bold;
	}

	.map-overlay-inner button {
		background-color: cornflowerblue;
		color: white;
		border-radius: 5px;
		display: inline-block;
		height: 20px;
		border: none;
		cursor: pointer;
	}

	.map-overlay-inner button:focus {
		outline: none;
	}

	.map-overlay-inner button:hover {
		background-color: blue;
		box-shadow: inset 0 0 0 3px rgba(0, 0, 0, 0.1);
		-webkit-transition: background-color 500ms linear;
		-ms-transition: background-color 500ms linear;
		transition: background-color 500ms linear;
	}

	.offset>label,
	.offset>input {
		display: inline;
	}

	#animateLabel {
		display: inline-block;
		min-width: 20px;
	}
</style>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v3.1.3/mapbox-gl-directions.css' type='text/css' />
<?php $this->load->view('front/head') ?>

<body class="top-navigation">
	<script type="text/javascript">
		var cordx = [];
		var cordx_list = [];
	</script>
	<div id="wrapper">
		<div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom white-bg">
				<?php $this->load->view('front/nav') ?>

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
				<div style="position: absolute;z-index:1000;bottom:300px;">
					<div class="card bg-white" style="background-color: white;padding:20px;margin-left:20px;">
						<div class="card-body">
							<h5 class="card-title">Kategori</h5>
							<form method="POST" action="<?= site_url('User/peta') ?>">
								<?php foreach ($data_kategori as $kategori) { ?>
									<div class="inline"><input type="checkbox" name="data[]" class="" value="<?= $kategori->id_kategori ?>">
										<?= $kategori->nama_kategori ?>
									</div>
								<?php } ?>
								<button type="submit" class="btn btn-success" id="btn-filter">Filter</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('front/footer') ?>
		</div>
	</div>

	<script src="<?= base_url('asset/user_/') ?>js/jquery-2.2.4.min.js"></script>
	<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v3.1.3/mapbox-gl-directions.js'></script>
	<script src='https://unpkg.com/@turf/turf/turf.min.js'></script>

	<script type="text/javascript">
		$("header").attr("id", "plain");
		$("footer").addClass("hidden-lg hidden-md hidden-sm");
		$(".map").css({
			"position": "fixed",
			"height": "100%"
		});
		mapboxgl.accessToken = 'pk.eyJ1IjoiZWZoYWwiLCJhIjoiY2ptOXRiZ3k2MDh4bzNrbnljMjk5Z2d5aSJ9.8dSNgeAjpdTlZ3x-b2vsog';
		var map = new mapboxgl.Map({
			container: 'maps',
			style: 'mapbox://styles/mapbox/streets-v10',
			// center: [118.72360371534046, -8.454855097885869],
			center: [111.4644147, -7.8701484],
			//111.4644147, -7.8701484
			zoom: 15
		});
		map.addControl(new mapboxgl.NavigationControl(), 'bottom-left');
		map.addControl(new mapboxgl.FullscreenControl(), 'bottom-left');
		map.addControl(new MapboxDirections({
			accessToken: mapboxgl.accessToken
		}), 'top-right');
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

				html += `<p>${i.data.deskripsi}<br/>Jarak : ${Math.round(i.distance)} Km</p>`
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


		map.on('mouseenter', 'symbols', function(e) {
			// Change the cursor style as a UI indicator.
			map.getCanvas().style.cursor = 'pointer';

			createPopUp(e.features[0].geometry.coordinates, e.features[0].properties.title, e.features[0].properties.description, e.features[0].properties.buka, e.features[0].properties.tutup, e.features[0].properties.kontak, e.features[0].properties.img, e.features[0].properties.alamat);
			$("#keterangan").show();
		});

		function hidePopUp(e) {
			var popUps = document.getElementsByClassName('mapboxgl-popup');
			// Check if there is already a popup on the map and if so, remove it
			if (popUps[0]) popUps[0].remove();
		}

		function hideRekomendasi() {
			$("#resRekomendasi").hide();
		}

		var checked_value = [];

		function arrayRemove(arr, value) {

			return arr.filter(function(ele) {
				return ele != value;
			});
		}

		$("input:checkbox").change(function() {
			is_exist = checked_value.includes(this.value)
			if (!is_exist) {
				if ($(this).is(':checked')) {
					checked_value.push(this.value);
				}
			} else {
				checked_value = arrayRemove(checked_value, this.value);
			}
			console.log(checked_value)
		});
	</script>
	<?php $this->load->view('front/script') ?>
</body>

</html>
