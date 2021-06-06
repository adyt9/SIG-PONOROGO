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
							<h3>Data Video </h3>
							<div style="width:100%; text-align:right; margin-bottom:10px;">
								<a href="<?= site_url('Video/add') ?>" class="on-default btn btn-success"><i class="fa fa-plus"></i></a>
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
										<th>#</th>
										<th style="width:20%">Judul</th>
										<th style="width:40%">Deskripsi</th>
										<th style="width:25%">Video</th>
										<th style="width:10%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($data_video as $video) { ?>
										<tr>
											<th scope="row"><?= $no; ?></th>
											<td><?= $video->judul ?></td>
											<td><?= $video->deskripsi ?></td>
											<td>
												<iframe width="300px" height="300" src="<?= $video->url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</td>
											<td>
												<a onclick="deleteKategori(<?= $video->id_video ?>)" class="btn btn-danger btnDelete" data-id="<?= $video->id_video ?>"><i class="fa fa-trash"></i></a>
												<a class="btn btn-primary" href="<?= site_url('Video/edit/' . $video->id_video) ?>"><i class="fa fa-pencil"></i></a>
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
				xhr.open('GET', '<?= site_url('Video/delete/') ?>' + id);
				xhr.send('id_video=' + id);
				alert('Data Video Berhasil dihapus')
				window.location.reload();
			}
		}
	</script>
</body>

</html>
