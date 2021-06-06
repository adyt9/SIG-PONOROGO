                <div class="row">
                    <div class="col-md-5">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"><span id="text_head_change">Input</span> <?php echo $judul?></h3>
                            <p class="text-muted m-b-30 font-13"> <?php echo $sub_text_form?></p>
                            <form id="form" class="form-horizontal">
                            <input type="hidden" name="id_wisata" id="id_wisata">
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-3 control-label">Wisata</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="text" name="nama_wisata" class="form-control" id="nama_wisata" placeholder="Wisata"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-3 control-label">Buka</label>
                                    <div class="col">
                                        <div class="col-xs-4 col-sm-3 col-md-3 clockpicker">
                                            <input type="text" name="buka" class="form-control " id="buka" placeholder="Buka"> 
                                        </div>  <div class="col-xs-1 col-sm-1 col-md-1">-</div>
                                        <div class="col-xs-4 col-sm-3 col-md-3 clockpicker">
                                            <input type="text" name="tutup" class="form-control" id="tutup" placeholder="Tutup"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="col-sm-3 control-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-email"></i></div>
                                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="col-sm-3 control-label">Kontak</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-headphone-alt"></i></div>
                                            <input type="text" name="kontak" class="form-control" id="kontak" placeholder="Kontak"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="col-sm-3 control-label">Kategori</label>
                                    <div class="col-sm-9">
                                      
                                      <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-agenda "></i></div>
                                            <select class="form-control" id="id_kategori" name="id_kategori">
                                            	
                                            </select>
                                            </div>
                                      
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                            <textarea rows="" cols="" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Peta</label>
                                    <div class="col-sm-9">
                                    <div id="map" style="height: 240px;margin-bottom: 23px;"></div>
                                    <div class="col-sm-6">
                                            <input type="text" name="lat" class="form-control" id="cordinate_b" placeholder="Lat">
                                    </div> 
                                    <div class="col-sm-6">
                                        <input type="text" name="lng" class="form-control" id="cordinate_a" placeholder="Lng"> 
                                    </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword4" class="col-sm-3 control-label">Fasilitas</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                            <input type="text" name="fasilitas" class="form-control" id="fasilitas" placeholder="Fasilitas"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword4" class="col-sm-3 control-label" id="label-gambar">Gambar</label>
                                    <div class="col-sm-9">
                                            <input type="file" name="gambar" class="fileinput fileinput-new input-group btn" id="gambarx" placeholder="Gambar">
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
                        <div class="col-md-7">
                         <div class="white-box">
                         <h3 class="box-title">Daftar <?php echo $judul?></h3>
                             <div class="scrollable">
                                            <div class="table-responsive">
                                                <table id="demo-foo-addrow" class="display nowrap dataTable" data-page-size="10">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Wisata</th>
                                                            <th>Alamat</th>
                                                            <th style="text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                             </div>
                         </div>           
                    </div>
                    <script>
                    function loadCSS(url) {
                        if (!$('link[href="' + url + '"]').length)
                            $('head').append('<link rel="stylesheet" type="text/css" href="' + url + '">');
                    }
					loadCSS('<?= base_url("asset/plugins/bower_components/"); ?>clockpicker/dist/jquery-clockpicker.min.css');
                
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
                    <!-- Calendar JavaScript -->
                    <script src="<?php echo base_url("asset") ?>/plugins/bower_components/moment/moment.js"></script>
                    <script src='<?php echo base_url("asset") ?>/plugins/bower_components/calendar/dist/fullcalendar.min.js'></script>
                    <script src="<?php echo base_url("asset") ?>/plugins/bower_components/calendar/dist/cal-init.js"></script>
                    <script src="<?php echo base_url("asset")?>/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
                    <script src="<?php echo base_url("asset")?>/bootstrap/dist/js/bootstrap.min.js"></script>
                    <!-- Date range Plugin JavaScript -->
                    <script src="<?php echo base_url("asset")?>/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
                    <!-- Date range Plugin JavaScript -->
                    <script src="<?php echo base_url("asset")?>/plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
                    <script src="<?php echo base_url("asset")?>/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
                    <script type="text/javascript">
                    $('.clockpicker').clockpicker({
                        donetext: 'Done'
                    , }).find('input').change(function () {
                        console.log(this.value);
                    });
                      </script>
                
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
							url : "<?= site_url("Wisata/u_wisata");?>",
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
						  url: "<?php echo site_url('Wisata/g_wisata') ?>",
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
							url : "<?php echo site_url("Wisata/g_wisata_by_id");?>" ,
							type : "POST",
							data : {ids:id},
							success : function(e){
								var Obj = JSON.parse(e);
								console.log(Obj);
								$("#gambars").show();
								$("#label-gambar").text("Ubah Gambar");
								$("#id_wisata").val(Obj[0].id_wisata);
								$("#nama_wisata").val(Obj[0].nama_wisata);
								$("#kontak").val(Obj[0].kontak);
								$("#alamat").val(Obj[0].alamat_wisata);
								$("#buka").val(Obj[0].buka);
								$("#tutup").val(Obj[0].tutup);
								$("#deskripsi").val(Obj[0].wisata_deskripsi);
								$("#id_kategori").html("<option value='"+Obj[0].id_kategori+"'>"+Obj[0].nama_kategori+"</option>");
								$("#fasilitas").val(Obj[0].id_fasilitas);
								$("#cordinate_b").val(Obj[0].latitude);
								$("#cordinate_a").val(Obj[0].longitude);
								$("#gambars").html("<img style='width:100%;height:200px;object-fit:cover;object-position:center;' class='thumbnail col-sm-12 col-md-12 col-xs-12' src='<?= base_url('image/')?>"+Obj[0].id_gambar+"'>");
        						$.ajax({
        							url: "<?= site_url("Wisata/g_kategori")?>",
        							success: function(e){
            							var data = "";
        								var Objx = JSON.parse(e);
        								Objx.forEach(function(index){
            								if(index.id_kategori != Obj[0].id_kategori){
        										data += "<option value='"+index.id_kategori+"'>"+index.nama_kategori+"</option>";
            								}
            							});
            							$("#id_kategori").append(data);
        							}
        						});
        						mapboxgl.accessToken = 'pk.eyJ1IjoiZWZoYWwiLCJhIjoiY2ptOXRiZ3k2MDh4bzNrbnljMjk5Z2d5aSJ9.8dSNgeAjpdTlZ3x-b2vsog';
        	                    var map = new mapboxgl.Map({
        	                        container: 'map', // container id
        	                        style: 'mapbox://styles/mapbox/streets-v9', // stylesheet location
        	                        center: [106.92646866340647,-6.919467746924553], // starting position [lng, lat]
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
        							url:"<?php echo site_url("Wisata/d_wisata");?>",
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
							  url: "<?php echo site_url("Wisata/i_wisata");?>",
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
                
                
                
                
                