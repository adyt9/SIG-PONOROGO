<!DOCTYPE html>
<html>

<?php $this->load->view('partials/head') ?>

<body class="pace-done skin-1">

	<div id="wrapper">


		<?php $this->load->view('partials/nav') ?>

		<div id="page-wrapper" class="gray-bg">

			<?php $this->load->view('partials/nav_bottom') ?>
			<div class="row">
				<div class="col-lg-3">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>Wisata</h5>
						</div>
						<div class="ibox-content">
							<h1 class="no-margins"><?= $total_wisata ?></h1>
							<small>Total Data Wisata</small>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>Fasilitas</h5>
						</div>
						<div class="ibox-content">
							<h1 class="no-margins"><?= $total_fasilitas ?></h1>
							<small>Total Data Fasilitas</small>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>Galeri</h5>
						</div>
						<div class="ibox-content">
							<h1 class="no-margins"><?= $total_galeri ?></h1>
							<small>Total Data Galeri</small>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>Video</h5>
						</div>
						<div class="ibox-content">
							<h1 class="no-margins"><?= $total_video ?></h1>
							<small>Total Data Video</small>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('partials/footer') ?>

		</div>
	</div>

	<?php $this->load->view('partials/script') ?>

</body>

</html>
