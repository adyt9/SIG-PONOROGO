<!DOCTYPE html>
<html>

<?php $this->load->view('partials/head') ?>

<body class="top-navigation">

	<div id="wrapper">
		<div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom white-bg">
				<?php $this->load->view('partials/nav.php') ?>
			</div>
			<div class="wrapper wrapper-content">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>Data Kategori</h5>
								</div>
								<div class="ibox-content">
									<table class="table table-bordered">
										<thead class="">
											<tr>
												<th>#</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td></td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
			<?php $this->load->view('partials/footer'); ?>

		</div>
	</div>
	<?php $this->load->view('partials/script') ?>

</body>

</html>