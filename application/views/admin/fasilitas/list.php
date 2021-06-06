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
							<h3>Data Fasilitas</h3>
							<div style="width:100%; text-align:right; margin-bottom:10px;">
								<a href="<?= site_url('Fasilitas/add') ?>" class="on-default btn btn-success"><i class="fa fa-plus"></i></a>
							</div>
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
										<th style="width:20%">Fasilitas</th>
										<th style="width:20%">Gambar</th>
										<th style="width:45%">Deskripsi</th>
										<th style="width:15%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($data_fasilitas as $fasilitas) { ?>
										<tr>
											<th scope="row"><?= $no; ?></th>
											<td>
												<?= $fasilitas->nama_fasilitas ?><br />

											</td>
											<td>
												<?php if ($fasilitas->gambar_fasilitas != '') { ?>
													<img style="width: 150px;" src="<?= base_url('uploads/' . $fasilitas->gambar_fasilitas) ?>">
												<?php } ?>
											</td>
											<td><?= $fasilitas->deskripsi ?></td>
											<td>
												<a onclick="deleteKategori(<?= $fasilitas->id_fasilitas ?>)" class="btn btn-danger btnDelete" data-id="<?= $fasilitas->id_fasilitas ?>"><i class="fa fa-trash"></i></a>
												<a class="btn btn-primary" href="<?= site_url('Fasilitas/edit/' . $fasilitas->id_fasilitas) ?>"><i class="fa fa-pencil"></i></a>
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
				xhr.open('GET', '<?= site_url('Fasilitas/delete/') ?>' + id);
				xhr.send('id_fasililtas=' + id);
				alert('Data Fasilitas Berhasil dihapus')
				window.location.reload();
			}
		}
	</script>
</body>

</html>
