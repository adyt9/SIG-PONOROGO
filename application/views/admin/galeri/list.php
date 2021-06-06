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
							<h3>Data Galeri</h3>
							<div style="width:100%; text-align:right; margin-bottom:10px;">
								<a href="<?= site_url('Galeri/add') ?>" class="on-default btn btn-success"><i class="fa fa-plus"></i></a>
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
										<th style="width: 5%;">#</th>
										<th style="width: 20%;">Judul</th>
										<th style="width: 35%;">Deskripsi</th>
										<th style="width: 30%;">Gambar</th>
										<th style="width: 20%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($data_galeri as $galeri) { ?>
										<tr>
											<th scope="row"><?= $no; ?></th>
											<td><?= $galeri->judul ?></td>
											<td><?= $galeri->deskripsi ?></td>
											<td>
												<?= $galeri->nama_file != '' ? '<img width="200px" src="' . base_url('uploads/' . $galeri->nama_file) . '">' : '' ?>
											</td>
											<td>
												<a onclick="deleteKategori(<?= $galeri->id_galeri ?>)" class="btn btn-danger btnDelete" data-id="<?= $galeri->id_galeri ?>"><i class="fa fa-trash"></i></a>
												<a class="btn btn-primary" href="<?= site_url('Galeri/edit/' . $galeri->id_galeri) ?>"><i class="fa fa-pencil"></i></a>
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
				xhr.open('GET', '<?= site_url('Galeri/delete/') ?>' + id);
				xhr.send('id_galeri=' + id);
				alert('Data Galeri Berhasil dihapus')
				window.location.reload();
			}
		}
	</script>
</body>

</html>
