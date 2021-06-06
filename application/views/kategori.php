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
						<div class="col-md-5">
							<div class="white-box">
								<h3 class="box-title m-b-0">Input <?php echo $judul ?></h3>
								<p class="text-muted m-b-30 font-13"> <?php echo $sub_text_form ?></p>
								<form id="form" class="form-horizontal">
									<input type="hidden" name="id_kategori" id="id_kategori">
									<div class="form-group">
										<label for="exampleInputuname" class="col-sm-3 control-label">Kategori*</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon"><i class="ti-user"></i></div>
												<input type="text" name="kategori" class="form-control" id="kategori" placeholder="Kategori">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-9 col-sm-push-3">

											<div class="">
												<button id="selectIcon" autofocus="" data-toggle="modal" data-target="#exampleModal" type="button" class="btn col-sm-12 btn-info">
													<i id="setIcon" style="font-size: 20px;"></i><br>
													<span>Set Icon</span>
												</button>
											</div>
										</div>
									</div>
									<input type="hidden" id="icon" name="icon">
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-3 control-label">Deskripsi*</label>
										<div class="col-sm-9">
											<textarea rows="" cols="" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi..."></textarea>
										</div>
									</div>

									<div class="form-group m-b-0">
										<div class="col-sm-offset-3 col-sm-9">
											<button type="submit" id="kirim_data" class="btn btn-info waves-effect waves-light m-t-10">Input</button>
											<button style="display: none;" type="submit" id="update_data" class="btn btn-info waves-effect waves-light m-t-10">Update</button>&nbsp;&nbsp;<button style="display: none;" id="add_new" class="btn btn-info waves-effect waves-light m-t-10">Tambah baru</button>
										</div>
										<p id="loading" style="display: none;">Loading...</p>
									</div>
								</form>
							</div>
						</div>
						<div class="col-md-7">
							<div class="white-box">
								<h3 class="box-title">Daftar <?php echo $judul ?></h3>
								<div class="scrollable">
									<div class="table-responsive">
										<table id="demo-foo-addrow" class="display nowrap dataTable" data-page-size="10">
											<thead>
												<tr>
													<th>No</th>
													<th>Kategori</th>
													<th>Icon</th>
													<th style="text-align:center;">Action</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel1">Seting Icon</h4>
								</div>
								<div id="icon_set" class="modal-body">

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
									<button type="button" id="pilihIcon" class="btn btn-info btn-disable">Pilih</button>
								</div>
							</div>
						</div>
					</div>
					<script src="<?php echo base_url("asset") ?>/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
					<script type="text/javascript">
						function loadCss(url) {
							if (!$('link[href="' + url + '"]').length)
								$('head').append('<link rel="stylesheet" type="text/css" href="' + url + '">');
						}
					</script>
					<script type="text/javascript">
						function setIcon(a, b) {
							$("#pilihIcon").click(function() {
								$("#icon").val(a);
								$("#setIcon").removeClass().addClass(b);
								$("#pilihIcon").attr("data-dismiss", "modal");
							});
						}
						$("#selectIcon").click(function() {

							var icon = "";
							$.ajax({
								url: "<?= site_url('Fasilitas/g_icon'); ?>",
								success: function(data) {
									loadCss('<?= base_url('asset/user_/css/icon_fonts/css/all_icons.min.css') ?>');
									var ObjIcon = JSON.parse(data);
									ObjIcon.forEach(function(index) {
										icon += "<i onClick=\"setIcon('" + index.id_icon + "','" + index.icon + "');return false;\" style=\'font-size:30px;\' class='" + index.icon + "'></i>";
									});
									$("#icon_set").html(icon);
								}
							});
						});
					</script>
					<script type="text/javascript">
						$(document).ready(function() {

							$.ajax({
								url: "<?php echo site_url("Dashboard/v_kategori/get_table"); ?>",
								success: function(json_data) {
									console.log(json_data);
									var opsi = "";
									obj = JSON.parse(json_data);
									obj.forEach(function(index) {
										opsi += "<option value='" + index.id_kategori + "'>";
										opsi += index.nama_kategori;
										opsi += "</option>";
									});
									$("#id_kategori").html(opsi);
								}
							});
							$("#update_data").click(function(e) {
								e.preventDefault();
								var data = $("#form")[0];
								$.ajax({
									url: "<?= site_url("Kategori/u_kategori"); ?>",
									type: "POST",
									data: new FormData(data),
									processData: false,
									contentType: false,
									cache: false,
									async: false,
									success: function(html) {
										if (html == '0') {
											swal("Gagal !", "Formulir Tidak Lengkap", "warning");
										} else if (html == '1') {
											swal("Berhasil !", "Data Berhasil Diupdate", "success");
											clearForm();
											$('#demo-foo-addrow').DataTable().ajax.reload();
										} else if (html == '2') {
											swal("Failed !", "Data Gagal Diupdate", "warning");
										}
									}
								});
							});
							$("#demo-foo-addrow").DataTable({
								"lengthMenu": [
									[7, 25, 50, -1],
									[7, 25, 50, "All"]
								],
								ordering: false,
								processing: true,
								serverSide: true,
								ajax: {
									url: "<?php echo site_url('Kategori/g_kategori') ?>",
									type: 'POST'
								}
							});

							function clearForm() {
								$("input").val("");
								$("textarea").val("");
							}
							$("#add_new").click(function(e) {
								e.preventDefault();
								$(this).hide();
								$("#update_data").hide();
								$("#kirim_data").show();
								clearForm();
							});
							$(document).on("click", ".edit", function() {
								var id = $(this).attr("data-id");
								$("#update_data").show();
								$("#add_new").show();
								$("#kirim_data").hide();

								$.ajax({
									url: "<?php echo site_url("Kategori/g_kategori_by_id"); ?>",
									type: "POST",
									data: {
										ids: id
									},
									success: function(e) {
										var Obj = JSON.parse(e);
										console.log(Obj);
										$("#id_kategori").val(Obj[0].id_kategori);
										$("#kategori").val(Obj[0].nama_kategori);
										$("#deskripsi").val(Obj[0].deskripsi);
										$("#icon").val(Obj[0].icon);
									}
								});
							});
							$(document).on("click", ".delete", function() {
								var id = $(this).attr("data-id");
								var ids = this.id;
								var index = $.inArray(ids);
								swal({
										title: "Konfirmasi",
										text: "Yakin akan menghapus data ini ?",
										type: "warning",
										showCancelButton: true,
										confirmButtonText: "Hapus",
										cancelButtonText: "Batal",
										closeOnConfirm: true,
									},
									function() {
										$.ajax({
											url: "<?php echo site_url("Kategori/d_kategori"); ?>",
											type: "POST",
											data: {
												id: id
											},
											success: function(a) {
												//$("#demo-foo-addrow").data.reload();
												$('#demo-foo-addrow').DataTable().ajax.reload();
											}
										});
									});
							});
							$("#form").submit(function(e) {
								e.preventDefault();
								var data = $("#form")[0];

								$.ajax({
									url: "<?php echo site_url("Kategori/i_kategori"); ?>",
									type: "POST",
									data: new FormData(data),
									processData: false,
									contentType: false,
									cache: false,
									async: false,
									beforeFilter: function() {
										$('#loading').show();
									},
									success: function(html) {
										$('#loading').hide();
										if (html == '0') {
											swal("Gagal !", "Formulir Tidak Lengkap", "warning");
										} else if (html == '1') {
											swal("Berhasil !", "Data Berhasil Disimpan", "success");
											clearForm();
											$('#demo-foo-addrow').DataTable().ajax.reload();
										} else if (html == '2') {
											swal("Failed !", "Data Gagal Disimpan", "warning");
										}
									}
								});

							});
						});
					</script>
				</div>

			</div>
			<?php $this->load->view('partials/footer'); ?>

		</div>
	</div>
	<?php $this->load->view('partials/script') ?>

</body>

</html>