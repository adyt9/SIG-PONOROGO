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
							<h3>Ubah Fasilitas </h3>
							<div style="width:100%; text-align:right; margin-bottom:10px;">
								<a class="on-default btn btn-success" href="<?= site_url('Fasilitas') ?>"><i class="fa fa-arrow-left"></i></a>
							</div>
						</div>
						<div class="ibox-content">
							<form action="<?= site_url('Fasilitas/edit/' . $data_fasilitas->id_fasilitas) ?>" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="id_fasilitas" class="form-control" id="id_fasilitas" placeholder="Fasilitas" value="<?= $data_fasilitas->id_fasilitas ?>">
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Fasilitas</label>
									<div class="col-sm-4">
										<input type="text" name="fasilitas" class="form-control" id="fasilitas" placeholder="Fasilitas" value="<?= $data_fasilitas->nama_fasilitas ?>">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
									<div class="col-sm-10">
										<textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat"><?= $data_fasilitas->alamat ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Deskripsi</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="deskripsi" id="deskripsi"><?= $data_fasilitas->deskripsi ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Kontak</label>
									<div class="col-sm-10">
										<input type="text" name="kontak" class="form-control" id="kontak" placeholder="Kontak" value="<?= $data_fasilitas->kontak ?>">
									</div>
								</div>

								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Map</label>
									<div class="col-sm-4">
										<div id="map" style="height: 480px; width:870px; margin-bottom: 23px;"></div>
										<input type="text" name="lat" class="form-control" id="cordinate_b" placeholder="Lat" value="<?= $data_fasilitas->latitude ?>">
										<br />
										<input type="text" name="lng" class="form-control" id="cordinate_a" placeholder="Lng" value="<?= $data_fasilitas->longitude ?>">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Gambar Fasilitas</label>
									<div class="col-sm-4">
										<input type="file" class="form-control" id="gambar" name="gambar" value="">
										<input type="hidden" class="form-control" id="gambar_" name="gambar_" value="<?= $data_fasilitas->gambar_fasilitas ?>">
										<br />
										<?php if ($data_fasilitas->gambar_fasilitas != '') { ?>
											<img src="<?= base_url('uploads/' . $data_fasilitas->gambar_fasilitas) ?>" width="200px;">
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
			.setLngLat([<?= $data_fasilitas->longitude ?>, <?= $data_fasilitas->latitude ?>])
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
