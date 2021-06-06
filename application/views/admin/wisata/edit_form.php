<!DOCTYPE html>
<html>
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.css' rel='stylesheet' />
<?php $this->load->view('partials/head') ?>

<body class="pace-done skin-1">

	<div id="wrapper">


		<?php $this->load->view('partials/nav') ?>

		<div id="page-wrapper" class="gray-bg">

			<?php $this->load->view('partials/nav_bottom') ?>
			<div class="row">
				<div class="col-md-12">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h3>Edit Wisata </h3>
							<div style="width:100%; text-align:right; margin-bottom:10px;">
								<a class="on-default btn btn-success" href="<?= site_url('Wisata') ?>"><i class="fa fa-arrow-left"></i></a>
							</div>
						</div>
						<div class="ibox-content">
							<form action="<?= site_url('Wisata/edit/' . $data_wisata->id_wisata) ?>" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="id_wisata" id="id_wisata" value="<?= $data_wisata->id_wisata ?>">
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Wisata</label>
									<div class="col-sm-4">
										<input type="text" name="nama_wisata" class="form-control" id="nama_wisata" placeholder="Wisata" value="<?= $data_wisata->nama_wisata ?>">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Buka</label>
									<div class="col-xs-4 col-sm-3 col-md-3 clockpicker">
										<input type="time" name="buka" class="form-control " id="buka" placeholder="Buka" value="<?= $data_wisata->buka ?>">
									</div>
									<div class="col-xs-1 col-sm-1 col-md-1">-</div>
									<div class="col-xs-4 col-sm-3 col-md-3 clockpicker">
										<input type="time" name="tutup" class="form-control" id="tutup" placeholder="Tutup" value="<?= $data_wisata->tutup ?>">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
									<div class="col-sm-10">
										<textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat"><?= $data_wisata->alamat_wisata ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Kontak</label>
									<div class="col-sm-10">
										<input type="text" name="kontak" class="form-control" id="kontak" placeholder="Kontak" value="<?= $data_wisata->kontak ?>">
									</div>
								</div>

								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Deskripsi</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="deskripsi" id="deskripsi"><?= $data_wisata->deskripsi ?></textarea>
									</div>
								</div>

								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Kategori</label>
									<div class="col-sm-10">
										<select class="form-control" id="id_kategori" name="id_kategori">
											<option>-Pilih Kategori-</option>
											<?php foreach ($data_kategori as $kat) { ?>
												<option <?= $kat->id_kategori == $data_wisata->id_kategori ? 'selected' : '' ?> value="<?= $kat->id_kategori ?>"><?= $kat->nama_kategori ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Fasilitas</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="fasilitas" name="fasilitas" value="<?= $data_wisata->id_fasilitas ?>">
									</div>
								</div>

								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Map</label>
									<div class="col-sm-4">
										<div id="map" style="height: 480px; width:870px; margin-bottom: 23px;"></div>
										<input type="text" name="lat" class="form-control" id="cordinate_b" placeholder="Lat" value="<?= $data_wisata->latitude ?>">
										<br />
										<input type="text" name="lng" class="form-control" id="cordinate_a" placeholder="Lng" value="<?= $data_wisata->longitude ?>">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Gambar Fasilitas</label>
									<div class="col-sm-4">
										<input type="file" class="form-control" id="gambar" name="gambar" value="">
										<input type="hidden" class="form-control" id="gambar_" name="gambar_" value="<?= $data_wisata->id_gambar ?>">
										<br />
										<?php if ($data_wisata->id_gambar != '') { ?>
											<img src="<?= base_url('uploads/' . $data_wisata->id_gambar) ?>" width="200px;">
										<?php } ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2">
									</div>
									<div class="col-sm-10">
										<button class="btn btn-warning" onclick="ctaCancel()">Batal</button>
										<button class="btn btn-primary">Simpan</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('partials/footer') ?>

		</div>
	</div>

	<?php $this->load->view('partials/script') ?>
	<script>
		function ctaCancel() {
			window.history.back();
		}

		// mapbox
		mapboxgl.accessToken = 'pk.eyJ1IjoiZWZoYWwiLCJhIjoiY2ptOXRiZ3k2MDh4bzNrbnljMjk5Z2d5aSJ9.8dSNgeAjpdTlZ3x-b2vsog';
		var map = new mapboxgl.Map({
			container: 'map', // container id
			style: 'mapbox://styles/mapbox/streets-v9', // stylesheet location
			center: [111.4644147, -7.8701484], // starting position [lng, lat]
			zoom: 10.5 // starting zoom
		});

		var marker = new mapboxgl.Marker({
				draggable: true
			})
			.setLngLat([<?= $data_wisata->longitude ?>, <?= $data_wisata->latitude ?>])
			.addTo(map);

		function onDragEnd() {
			var lngLat = marker.getLngLat();

			var a = lngLat.lng;
			var b = lngLat.lat;
			document.getElementById("cordinate_a").value = a;
			document.getElementById("cordinate_b").value = b;
		}

		marker.on('dragend', onDragEnd);
	</script>
</body>

</html>
