                <div class="row">
                    <div class="col-md-4">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Input <?php echo $judul?></h3>
                            <p class="text-muted m-b-30 font-13"> <?php echo $sub_text_form?></p>
                            <form id="form" class="form-horizontal">
                                <input type="hidden" name="id_agenda"  id="id_agenda" >
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-3 control-label">Agenda</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-announcement "></i></div>
                                            <input type="text" name="agenda" class="form-control" id="agenda" placeholder="Agenda"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-3 control-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <textarea class="form-control" rows="5" cols="100%" name="deskripsi" id="deskripsi"></textarea>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-3 control-label">Tanggal</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-calendar"></i></div>
                                            <input type="text" name="tanggal" id="tanggal" class="form-control input-daterange-datepicker" id="exampleInputuname" placeholder="Tanggal"> </div>
                                            <input type="hidden" name="tanggal_mulai" id="tanggal_mulai">
                                            <input type="hidden" name="tanggal_berakhir" id="tanggal_berakhir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-3 control-label">Buka</label>
                                    <div class="col">
                                        <div class="col-xs-4 col-sm-4 col-md-4 clockpicker">
                                            <input type="text" name="waktu_mulai" class="form-control " id="waktu_mulai" > 
                                        </div>
                                        <div class="col-xs-4 col-md-4 clockpicker">
                                            <input type="text" name="waktu_selesai" class="form-control" id="waktu_selesai" > 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="col-sm-3 control-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-location-pin "></i></div>
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
                                    <label for="inputPassword4" class="col-sm-3 control-label" id="label-gambar">Gambar</label>
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
                                </div>
                            </form>
                        </div>
                    </div>
                    
                     <div class="col-md-8">
                         <div class="white-box">
                         <h3 class="box-title">Daftar <?php echo $judul?></h3>
                             <div class="scrollable">
                                            <div class="table-responsive">
                                                <table id="demo-foo-addrow" class="display nowrap dataTable" data-page-size="10">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Agenda</th>
                                                            <th>Jadwal</th>
                                                            <th style="text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dt_tab">
                                                        
                                                    </tbody>
                                                    <tfoot>
                                                    </tfoot>
                                                </table>
                                            </div>
                             </div>
                         </div>           
                    </div>
                    
                </div>
                 <script>
                     function loadCSS(url) {
                         if (!$('link[href="' + url + '"]').length)
                             $('head').append('<link rel="stylesheet" type="text/css" href="' + url + '">');
                     }
					loadCSS('<?= base_url("asset/plugins/bower_components/"); ?>bootstrap-daterangepicker/daterangepicker.css');
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
                    /*load the css files  */
					
					/*load the css files  */
                    </script>
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
                      $('.input-daterange-datepicker').daterangepicker({
                         buttonClasses: ['btn', 'btn-sm']
                         , applyClass: 'btn-danger'
                         , cancelClass: 'btn-inverse'
                     }, function(start, end, label) {
                    	    $("#tanggal_mulai").val(start.format('YYYY-MM-DD'));
                    	    $("#tanggal_berakhir").val(end.format('YYYY-MM-DD'));
                    	    console.log($("#tanggal_mulai").val());
                    	    console.log($("#tanggal_berakhir").val());
                     });
                      </script>
                      <script type="text/javascript">
                    $('.clockpicker').clockpicker({
                        donetext: 'Done'
                    , }).find('input').change(function () {
                        console.log(this.value);
                    });
                      </script>
                      <script type="text/javascript">
                <!--
					                
                //-->
				$(document).ready(function(){
					function split_date(){
						
					}
					$("#update_data").click(function(e){
						e.preventDefault();
						var data = $("#form")[0];
						$.ajax({
							url : "<?= site_url("Agenda/u_agenda");?>",
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
						  url: "<?php echo site_url('Agenda/g_agenda') ?>",
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
					$("#form").submit(function(e){
						e.preventDefault();
						var data = $("#form")[0];
						
						$.ajax({
							  url: "<?php echo site_url("Agenda/i_agenda");?>",
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
    							url:"<?= site_url("Agenda/d_agenda");?>",
    							type: "POST",
    							data:{id:id},
    							success: function(a){
    								$('#demo-foo-addrow').DataTable().ajax.reload();
    							}
							});
						});
				});
				$(document).on("click",".edit",function(){
					var id = $(this).attr("data-id");
					$("#update_data").show();
					$("#add_new").show();
					$("#kirim_data").hide();
					
					$.ajax({
						url : "<?php echo site_url("Agenda/g_agenda_by_id");?>" ,
						type : "POST",
						data : {ids:id},
						success : function(e){
							var Obj = JSON.parse(e);
							console.log(Obj);
							$("#agenda").val(Obj[0].judul_agenda);
							$("#id_agenda").val(Obj[0].id_agenda);
							$("#deskripsi").val(Obj[0].deskripsi);
							$("#tanggal").val(Obj[0].tanggal);
							$("#alamat").val(Obj[0].alamat);
							$("#kontak").val(Obj[0].kontak);
							$("#tanggal_mulai").val(Obj[0].tanggal_mulai);
							$("#tanggal_berakhir").val(Obj[0].tanggal_berakhir);
							$("#waktu_mulai").val(Obj[0].waktu_mulai);
							$("#waktu_selesai").val(Obj[0].waktu_selesai);
							$("#cordinate_b").val(Obj[0].latitude);
							$("#cordinate_a").val(Obj[0].longitude);
							$("#gambars").show();
							$("#label-gambar").text("Ubah Gambar");
							$("#gambars").html("<img style='width:100%;height:200px;object-fit:cover;object-position:center;' class='thumbnail col-sm-12 col-md-12 col-xs-12' src='<?= base_url('image/')?>"+Obj[0].gambar+"'>");
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
                </script>
                
                
                