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
							<h3>Edit Admin </h3>
							<div style="width:100%; text-align:right; margin-bottom:10px;">
								<a class="on-default btn btn-success" href="<?= site_url('Admin') ?>"><i class="fa fa-arrow-left"></i></a>
							</div>
						</div>
						<div class="ibox-content">
							<form action="<?= site_url('Admin/edit/' . $data_admin->id_admin) ?>" method="POST" enctype="multipart/form-data">
								<input type="hidden" class="form-control" id="id_admin" name="id_admin" value="<?= $data_admin->id_admin ?>">
								<input type="hidden" class="form-control" id="gambar" name="gambar" value="<?= $data_admin->gambar ?>">
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="username" name="username" value="<?= $data_admin->username ?>" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
									<div class="col-sm-4">
										<input type="email" class="form-control" id="email" name="email" value="<?= $data_admin->email ?>">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
									<div class="col-sm-4">
										<input type="password" class="form-control" id="password" name="password" value="" required="">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Ulangi Password</label>
									<div class="col-sm-4">
										<input type="password" class="form-control" id="re_password" name="re_password" value="" required="">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Role</label>
									<div class="col-sm-4">
										<select class="form-control" id="role" name="role">
											<option value="" disabled="" required="">Pilih role</option>
											<option value="superadmin" <?= $data_admin->role == 'superadmin' ? 'selected' : '' ?>>Superadmin</option>
											<option value="admin" <?= $data_admin->role == 'admin' ? 'selected' : '' ?>>admin</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Foto Profil</label>
									<div class="col-sm-4">
										<input type="file" class="form-control" id="foto_profil" name="foto_profil" value="<?= base_url('uploads/' . $data_admin->gambar) ?>" required=""><br />
										<?php if ($data_admin->gambar != '') { ?>
											<img class="img-responsive" style="100px;" src="<?= base_url('uploads/' . $data_admin->gambar) ?>">
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
	</script>
</body>

</html>
