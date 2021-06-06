                <div class="row">
                    <div class="col-md-5">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Input <?php echo $judul?></h3>
                            <p class="text-muted m-b-30 font-13"> <?php echo $sub_text_form?></p>
                            <form id="form" class="form-horizontal">
                            <input type="hidden" name="id_video" id="id_video">
                            <input type="hidden" name="nama_video" id="nama_video">
                            <input type="hidden" name="cov" id="cov">
                            	<div class="form-group">
                                    <label for="inputPassword4" class="col-sm-3 control-label" id="label-video">Video</label>
                                    <div class="col-sm-9">
                                            <input type="file" name="video" class="fileinput fileinput-new input-group" id="video" placeholder="Video">
                                            <div id="videos" style="display: none;">
                                            	
                                            </div>
                                    </div>
                                    
                                </div>
                            	<div class="form-group">
                                    <label for="inputPassword4" class="col-sm-3 control-label" id="label-gambar">Cover</label>
                                    <div class="col-sm-9">
                                            <input type="file" name="gambar" class="fileinput fileinput-new input-group" id="exampleInputpwd2" placeholder="Gambar">
                                            <div id="gambars"></div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-3 control-label">Judul</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="text" name="judul" class="form-control" id="judul" placeholder="judul"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                            <textarea rows="" cols="" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi..."></textarea>
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
                        <div class="col-md-7">
                         <div class="white-box">
                         <h3 class="box-title">Daftar <?php echo $judul?></h3>
                             <div class="scrollable">
                                            <div class="table-responsive">
                                                <table id="demo-foo-addrow" class="display nowrap dataTable" data-page-size="10">
                                                    <thead>
                                                        <tr>
                                                            <th>Video</th>
                                                            <th style="text-align:center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                             </div>
                         </div>           
                    </div>
                    <script>
                    mapboxgl.accessToken = 'pk.eyJ1IjoiZWZoYWwiLCJhIjoiY2ptOXRiZ3k2MDh4bzNrbnljMjk5Z2d5aSJ9.8dSNgeAjpdTlZ3x-b2vsog';
                    var map = new mapboxgl.Map({
                        container: 'map', // container id
                        style: 'mapbox://styles/mapbox/streets-v9', // stylesheet location
                        center: [118.7235608,-8.4547702], // starting position [lng, lat]
                        zoom: 13 // starting zoom
                    });
                    
                    var marker = new mapboxgl.Marker({
                        draggable: true
                    })
                        .setLngLat([118.7235608,-8.4547702])
                        .addTo(map);
                    function onDragEnd() {
                        var lngLat = marker.getLngLat();
                        
                        var a = lngLat.lng;
                        var b = lngLat.lat;
                        document.getElementById("cordinate_a").value = a; 
                        document.getElementById("cordinate_b").value = b; 
                    }
                    
                    marker.on('dragend', onDragEnd);
                    
                    </script>
                </div>
                <script src="<?php echo base_url("asset")?>/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
                <script type="text/javascript">
                <!--
					                
                //-->
				$(document).ready(function(){

					$.ajax({
						url : "<?php echo site_url("Dashboard/v_kategori/get_table"); ?>",
						success : function(json_data){
							console.log(json_data);
							var opsi = "";
							obj = JSON.parse(json_data);
							obj.forEach(function(index){
								opsi += "<option value='"+index.id_kategori+"'>";
								opsi += index.nama_kategori;
								opsi += "</option>";
							});
							$("#id_kategori").html(opsi);
    					}
    				});
					$("#update_data").click(function(e){
						e.preventDefault();
						var data = $("#form")[0];
						$.ajax({
							url : "<?= site_url("Video/u_video");?>",
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
						  url: "<?php echo site_url('Video/g_video') ?>",
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
						$("#videos").hide();
						clearForm();
					});
					$(document).on("click",".edit",function(){
						var id = $(this).attr("data-id");
						$("#update_data").show();
						$("#add_new").show();
						$("#kirim_data").hide();
						
						$.ajax({
							url : "<?php echo site_url("Video/g_video_by_id");?>" ,
							type : "POST",
							data : {ids:id},
							success : function(e){
								var Obj = JSON.parse(e);
								console.log(Obj);
								$("#videos").show();
								$("#videos").html('<video id="video_p" poster="" width="100%" height="200" style="object-fit:cover;object-position:bottom;" controls><source width="200" id="video_wisata" src="'+'<?= base_url('video/');?>'+Obj[0].nama_video+'" type="video/mp4"></video>');
								$("#gambars").show();
								$("#label-video").text("Ganti video");
								$("#label-gambar").text("Ganti Gambar");
								$("#id_video").val(Obj[0].id_video);
								$("#cov").val(Obj[0].cover);
								$("#nama_video").val(Obj[0].nama_video);
								$("#judul").val(Obj[0].judul);
								$("#deskripsi").val(Obj[0].deskripsi);
								$("#cordinate_b").val(Obj[0].latitude);
								$("#cordinate_a").val(Obj[0].longitude);
								$("#gambars").html("<img style='width:100%;height:150px;object-fit:cover;object-position:center,center;' class='thumbnail col-sm-12 col-md-12 col-xs-12' src='<?= base_url('image/')?>"+Obj[0].cover+"'>");
        						mapboxgl.accessToken = 'pk.eyJ1IjoiZWZoYWwiLCJhIjoiY2ptOXRiZ3k2MDh4bzNrbnljMjk5Z2d5aSJ9.8dSNgeAjpdTlZ3x-b2vsog';
        	                    var map = new mapboxgl.Map({
        	                        container: 'map', // container id
        	                        style: 'mapbox://styles/mapbox/streets-v9', // stylesheet location
        	                        center: [118.7235608,-8.4547702], // starting position [lng, lat]
        	                        zoom: 13 // starting zoom
        	                    });
        	                    
        	                    var marker = new mapboxgl.Marker({
        	                        draggable: true
        	                    })
        	                        .setLngLat([Obj[0].longitude,Obj[0].latitude])
        	                        .addTo(map);
        	                    function onDragEnd() {
        	                        var lngLat = marker.getLngLat();
        	                        
        	                        var a = lngLat.lng;
        	                        var b = lngLat.lat;
        	                        document.getElementById("cordinate_a").value = a; 
        	                        document.getElementById("cordinate_b").value = b; 
        	                    }
        	                    
        	                    marker.on('dragend', onDragEnd);
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
        							url:"<?php echo site_url("Video/d_video");?>",
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
							  url: "<?php echo site_url("Video/i_video");?>",
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
                
                
                
                
                