                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Input <?php echo $judul?></h3>
                            <p class="text-muted m-b-30 font-13"> <?php echo $sub_text_form?></p>
                            <form id="form" class="form-horizontal">
                            <input type="hidden" name="id_admin" id="id_admin">
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-3 control-label">Username*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="text" name="username" class="form-control" id="username" placeholder="Username"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-3 control-label">Password*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="text" name="password" class="form-control" id="password" placeholder="Password"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-3 control-label">Email*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="text" name="email" class="form-control" id="email" placeholder="Email"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword4" class="col-sm-3 control-label" id="label-gambar">Foto Profil*</label>
                                    <div class="col-sm-9">
                                            <input type="file" name="gambar" class="fileinput fileinput-new input-group" id="exampleInputpwd2" placeholder="Gambar">
                                            <div id="gambars"></div>
                                    </div>
                                    
                                </div>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" id="kirim_data" class="btn btn-info waves-effect waves-light m-t-10">Input</button>
                                        <button style="display: none;" type="submit" id="update_data" class="btn btn-info waves-effect waves-light m-t-10">Update</button>&nbsp;&nbsp;<button style="display: none;" type="submit" id="add_new" class="btn btn-info waves-effect waves-light m-t-10">Tambah baru</button>
                                    </div>
                                    <p id="loading" style="display: none;">Loading...</p>
                                </div>
                            </form>
                        </div>
                    </div>
                        <div class="col-md-6">
                         <div class="white-box">
                         <h3 class="box-title">Daftar <?php echo $judul?></h3>
                             <div class="scrollable">
                                            <div class="table-responsive">
                                                <table id="demo-foo-addrow" class="display nowrap dataTable" data-page-size="10">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                            <th style="text-align:center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                             </div>
                         </div>      
                    </div>
                </div>
                <script src="<?php echo base_url("asset")?>/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
                <script type="text/javascript">
                <!--
					                
                //-->
				$(document).ready(function(){

					$("#update_data").click(function(e){
						e.preventDefault();
						var data = $("#form")[0];
						$.ajax({
							url : "<?= site_url("Admin/u_admin");?>",
							type : "POST",
							data : new FormData(data),
							processData:false,
		                    contentType:false,
		                    cache:false,
		                    async:false,
							success: function(html){
								if(html=='0'){
								    swal("Gagal !","Formulir Tidak Lengkap","warning");
								}else if(html=='1'){
									swal("Berhasil !","Data Berhasil Diupdate","success");
									clearForm();
									$('#demo-foo-addrow').DataTable().ajax.reload();
								}else if(html=='2'){
									swal("Failed !","Data Gagal Diupdate","warning");
								}
							  }
						});
					});
					$("#demo-foo-addrow").DataTable({
						"lengthMenu": [[7, 25, 50, -1], [7, 25, 50, "All"]],
						ordering: false,
						processing: true,
						serverSide: true,
						ajax: {
						  url: "<?php echo site_url('Admin/g_admin') ?>",
						  type:'POST'
						}
					});
					function clearForm()
					{
						$("input").val("");
						$("textarea").val("");
					}
					$("#add_new").click(function(){
						$(this).hide();
						$("#update_data").hide();
						$("#kirim_data").show();
						$("#gambars").hide();
						$("#label-gambar").text("Gambar");
						clearForm();
					});
					$(document).on("click",".edit",function(){
						var id = $(this).attr("data-id");
						$("#update_data").show();
						$("#add_new").show();
						$("#kirim_data").hide();
						
						$.ajax({
							url : "<?php echo site_url("Admin/g_admin_by_id");?>" ,
							type : "POST",
							data : {ids:id},
							success : function(e){
								var Obj = JSON.parse(e);
								console.log(Obj);
								$("#gambars").show();
								$("#label-gambar").text("Ubah Gambar");
								$("#id_admin").val(Obj[0].id_admin);
								$("#username").val(Obj[0].username);
								$("#password").val(Obj[0].password);
								$("#email").val(Obj[0].email);
								$("#gambars").html("<img style='width:100%;height:200px;object-fit:cover;object-position:center;' class='thumbnail col-sm-12 col-md-12 col-xs-12' src='<?= base_url('image/')?>"+Obj[0].gambar+"'>");
							}
						});
					});
					$(document).on("click",".delete",function(){
						var id = $(this).attr("data-id");
						var ids = this.id;
				        var index = $.inArray(ids);
						swal({
							title:"Konfirmasi",
							text:"Yakin akan menghapus data ini ?",
							type: "warning",
							showCancelButton: true,
							confirmButtonText: "Hapus",
							cancelButtonText: "Batal",
							closeOnConfirm: true,
							},
							function(){
    							$.ajax({
        							url:"<?php echo site_url("Admin/d_admin");?>",
        							type: "POST",
        							data:{id:id},
        							success: function(a){
        								//$("#demo-foo-addrow").data.reload();
        								$('#demo-foo-addrow').DataTable().ajax.reload();
        							}
    							});
							});
					});
					$("#form").submit(function(e){
						e.preventDefault();
						var data = $("#form")[0];
						
						$.ajax({
							  url: "<?php echo site_url("Admin/i_admin");?>",
							  type: "POST",
							  data: new FormData(data),
							  processData:false,
		                      contentType:false,
		                      cache:false,
		                      async:false,
							  beforeFilter: function(){
							    $('#loading').show();
							  },
							  success: function(html){
							    $('#loading').hide();
								if(html=='0'){
								    swal("Gagal !","Formulir Tidak Lengkap","warning");
								}else if(html=='1'){
									swal("Berhasil !","Data Berhasil Disimpan","success");
									clearForm();
									$('#demo-foo-addrow').DataTable().ajax.reload();
								}else if(html=='2'){
									swal("Failed !","Data Gagal Disimpan","warning");
								}
							  }
							});
							  
					});
				});
                </script>
                
                
                
                
                