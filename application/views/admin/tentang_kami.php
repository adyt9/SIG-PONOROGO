                <div class="row">
                    
                        <div class="col-md-12">
                         <div class="white-box">
                         <h3 class="box-title">Daftar <?php echo $judul?></h3>
                             <div class="scrollable">
                                            <div class="table-responsive">
                                                <table id="demo-foo-addrow" class="display nowrap dataTable" data-page-size="10">
                                                </table>
                                            </div>
                                    	    <a id="edit_data" href="#edit_data_page" class="btn btn-info waves-effect waves-light m-t-10">Edit</a>
                                             <div id="edit_data_page"></div>
                                    
                                    </div>
                             </div>
                             <div class="row" id="edit_page">
                             <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Edit <?php echo $judul?></h3>
                            <p class="text-muted m-b-30 font-13"> <?php echo $sub_text_form?></p>
                            <form id="form" class="form-horizontal">
                            <input type="hidden" name="id_kategori" id="id_kategori">
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-4 control-label">Nama Instansi*</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="text" name="nama_instansi" class="form-control" id="nama_instansi" placeholder="Nama Instansi"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-4 control-label">No Telp*</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Nomor Telepon"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-4 control-label">Email*</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="text" name="email" class="form-control" id="email" placeholder="Email"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-4 control-label">Facebook*</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="text" name="fb" class="form-control" id="fb" placeholder="Facebook"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-4 control-label">Whatsapp*</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="text" name="wa" class="form-control" id="wa" placeholder="wa"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-4 control-label">Instagram*</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="text" name="ig" class="form-control" id="ig" placeholder="Instagram"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-4 control-label">Youtube*</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="text" name="yt" class="form-control" id="yt" placeholder="Youtube"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Deskripsi*</label>
                                    <div class="col-sm-6">
                                            <textarea rows="" cols="" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi..."></textarea>
                                    </div>
                                </div>
                               
                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-4 col-sm-9">
                                        <button type="submit" id="update_data" class="btn btn-info waves-effect waves-light m-t-10">Update</button>&nbsp;&nbsp;<button style="display: none;" id="add_new" class="btn btn-info waves-effect waves-light m-t-10">Tambah baru</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                         </div>           
                    </div>
                </div>
                <script src="<?php echo base_url("asset")?>/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
                <script type="text/javascript">
				$(document).ready(function(){
					$("#edit_page").hide();
					$("#edit_data").click(function(){
    					$("#edit_page").show();
						$.ajax({
							url : "<?php echo site_url("About/g_dinas");?>" ,
							type : "POST",
							success : function(e){
								var Obj = JSON.parse(e);
								console.log(Obj);
								$("#nama_instansi").val(Obj[0].nama_instansi);
								$("#no_telp").val(Obj[0].no_telp);
								$("#email").val(Obj[0].email);
								$("#fb").val(Obj[0].fb);
								$("#wa").val(Obj[0].wa);
								$("#ig").val(Obj[0].ig);
								$("#yt").val(Obj[0].yt);
								$("#deskripsi").val(Obj[0].deskripsi);
							}
						});
					});
					function tampilkan_data(){
        				$.ajax({
        					url : "<?php echo site_url("About/g_dinas"); ?>",
        					success : function(json_data){
        						var a = JSON.parse(json_data);
        						var tbl = "";
        						a.forEach(function(index){
    								tbl += "<tr><td><b>Instansi</b></td><td>"+index.nama_instansi+"</td></tr>";
    								tbl += "<tr><td><b>Nomor telp</b></td><td>"+index.no_telp+"</td></tr>";
    								tbl += "<tr><td><b>Deskripsi</b></td><td>"+index.deskripsi+"</td></tr>";
    								tbl += "<tr><td><b>Email</b></td><td>"+index.email+"</td></tr>";
    								tbl += "<tr><td><b>Facebook</b></td><td>"+index.fb+"</td></tr>";
    								tbl += "<tr><td><b>Whatsapp</b></td><td>"+index.wa+"</td></tr>";
    								tbl += "<tr><td><b>instagram</b></td><td>"+index.ig+"</td></tr>";
    								tbl += "<tr><td><b>Youtube</b></td><td>"+index.yt+"</td></tr>";
            					});
            					$("#demo-foo-addrow").html(tbl);
        					}
        				});
					}
					tampilkan_data();
					function clearForm()
					{
						$("input").val("");
						$("textarea").val("");
					}
					$("#add_new").click(function(e){
						e.preventDefault();
						$(this).hide();
						$("#update_data").hide();
						$("#kirim_data").show();
						clearForm();
					});
					$("#form").submit(function(e){
						e.preventDefault();
						var data = $("#form")[0];
						$.ajax({
							  url: "<?php echo site_url("About/i_about");?>",
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
									tampilkan_data();
									clearForm();
									$("#edit_page").hide();
								}else if(html=='2'){
									swal("Failed !","Data Gagal Disimpan","warning");
								}
							  }
							});
							  
					});
				});
                </script>
                
                
                
                
                