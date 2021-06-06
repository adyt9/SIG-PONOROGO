<!DOCTYPE html>
<html>

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
							<h3>Ubah Kategori </h3>
							<div style="width:100%; text-align:right; margin-bottom:10px;">
								<a class="on-default btn btn-success" href="<?= site_url('Kategori') ?>"><i class="fa fa-arrow-left"></i></a>
							</div>
						</div>
						<div class="ibox-content">
							<form action="<?= site_url('Kategori/edit/' . $kategori->id_kategori) ?>" method="POST">
								<input type="hidden" id="id_kategori" name="id_kategori" value="<?= $kategori->id_kategori ?>">
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Kategori</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="kategori" name="kategori" value="<?= $kategori->nama_kategori ?>">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Deskripsi</label>
									<div class="col-sm-10">
										<textarea class="form-control" id="deskripsi" name="deskripsi"><?= $kategori->deskripsi ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Icon</label>
									<div class="col-sm-4">
										<select name="icon" class="form-control">
											<?php foreach ($icons as $icon) { ?>
												<option <?= $kategori->icon == $icon->id_icon ? 'selected' : '' ?> value="<?= $icon->id_icon ?>"><?= $icon->icon ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2">
									</div>
									<div class="col-sm-10">
										<button class="btn btn-warning" onclick="ctaCancel()">Batal</button>
										<button class="btn btn-primary">Perbarui</button>
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
	</script>
</body>

</html>
