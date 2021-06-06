<!DOCTYPE html>
<html>
<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" /> -->

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
							<h3>Tambah Kategori </h3>
							<div style="width:100%; text-align:right; margin-bottom:10px;">
								<a class="on-default btn btn-success" href="<?= site_url('Kategori') ?>"><i class="fa fa-arrow-left"></i></a>
							</div>
						</div>
						<div class="ibox-content">
							<form action="<?= site_url('Kategori/add') ?>" method="POST">
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Kategori</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="kategori" name="kategori" value="">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Deskripsi</label>
									<div class="col-sm-10">
										<textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Icon</label>
									<div class="col-sm-4">
										<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
										<select name="icon" class="form-control">
											<?php foreach ($icons as $icon) { ?>
												<option value="<?= $icon->id_icon ?>"><?= $icon->icon ?></option>
											<?php } ?>
										</select>
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
	</script>
</body>

</html>
