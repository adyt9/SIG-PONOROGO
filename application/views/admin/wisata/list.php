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
							<h3>Data Wisata </h3>
							<div style="width:100%; text-align:right; margin-bottom:10px;">
								<a href="<?= site_url('Wisata/add') ?>" class="on-default btn btn-success"><i class="fa fa-plus"></i></a>
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
										<th style="width:20%">Wisata</th>
										<th style="width:20%">Gambar</th>
										<th style="width:45%">Deskripsi</th>
										<th style="width:15%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($data_wisata as $wisata) { ?>
										<tr>
											<th scope="row"><?= $no; ?></th>
											<td>
												<?= $wisata->nama_wisata ?><br />
											</td>
											<td>
												<?php if ($wisata->id_gambar != '') { ?>
													<img style="width: 150px;" src="<?= base_url('uploads/' . $wisata->id_gambar) ?>">
												<?php } ?>
											</td>
											<td><?= $wisata->deskripsi ?></td>
											<td>
												<a onclick="deleteKategori(<?= $wisata->id_wisata ?>)" class="btn btn-danger btnDelete" data-id="<?= $wisata->id_wisata ?>"><i class="fa fa-trash"></i></a>
												<a class="btn btn-primary" href="<?= site_url('Wisata/edit/' . $wisata->id_wisata) ?>"><i class="fa fa-pencil"></i></a>
											</td>
										</tr>
									<?php $no++;
									} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div></br></br>
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
				xhr.open('GET', '<?= site_url('Wisata/delete/') ?>' + id);
				xhr.send('id_wisata=' + id);
				alert('Data Wisata Berhasil dihapus')
				window.location.reload();
			}
		}
	</script>
</body>

</html>
