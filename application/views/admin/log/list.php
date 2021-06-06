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
							<h3>Data Log</h3>
						</div>
						<?php if ($this->session->flashdata('stsMessage') != '') { ?>

							<div class="alert">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong><?= $this->session->flashdata('stsMessage') ?>!</strong>
							</div>

						<?php } ?>

						<div class="ibox-content">
							<table class="table table-bordered" id="tblKategori">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Admin</th>
										<th scope="col">Aktifitas</th>
										<th scope="col">Diinsert</th>
										<th scope="col">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($log as $logs) { ?>
										<tr>
											<th scope="row"><?= $no; ?></th>
											<td><?= $logs->username ?></td>
											<td><?= $logs->aktifitas ?></td>
											<td><?= $logs->diinsert_pada ?></td>
											<td>
												<a onclick="deleteKategori(<?= $logs->id ?>)" class="btn btn-danger btnDelete" data-id="<?= $logs->id ?>"><i class='fa fa-trash'></i></a>
											</td>
										</tr>
									<?php $no++;
									} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<?php $this->load->view('partials/footer') ?>

		</div>
	</div>

	<?php $this->load->view('partials/script') ?>
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			var dtbKategori = $('#tblKategori').DataTable();
		});

		function deleteKategori(id) {
			let con = confirm('Hapus data ini ?');
			if (con) {
				let xhr = new XMLHttpRequest;
				xhr.open('GET', '<?= site_url('Log/delete/') ?>' + id);
				xhr.send('id=' + id);
				alert('Data Log Berhasil dihapus')
				window.location.reload();
			}
		}
	</script>
</body>

</html>
