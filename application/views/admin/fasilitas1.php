                <div class="row">
                    <div class="col-md-4">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Input <?php echo $judul?></h3>
                            <p class="text-muted m-b-30 font-13"> <?php echo $sub_text_form?></p>
                            <form id="form" class="form-horizontal">
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-3 control-label">Fasilitas*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-car"></i></div>
                                            <input type="text" name="fasilitas" class="form-control" id="exampleInputuname" placeholder="Nama Wisata"> </div>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="inputPassword4" class="col-sm-3 control-label">Gambar*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-file-image-o"></i></div>
                                            <input type="text" class="form-control" id="exampleInputpwd2" placeholder="Gambar"> </div>
                                    </div>
                                </div>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" id="kirim_data" class="btn btn-info waves-effect waves-light m-t-10">Input</button>
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
                                                <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Fasilitas</th>
                                                            <th>Action</th>
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
                
                    
                
                                <script type="text/javascript">
                <!--
					                
                //-->
				$(document).ready(function(){
					function tampilkanData(){
						$.ajax({
							  url: "<?php echo site_url("Dashboard/v_fasilitas/get_table");?>",
							  success: function(html){
							    $("#dt_tab").html(html);
							  }
						});
					}
					tampilkanData();
					$("#kirim_data").click(function(e){
						e.preventDefault();
						$.ajax({
							  url: "<?php echo site_url("Dashboard/p_fasilitas");?>",
							  type: "POST",
							  data: $('#form').serialize(),
							  beforeFilter: function(){
							    $('#loading').show();
							  },
							  success: function(html){
							    $('#loading').hide();
							    
							    tampilkanData();

							    alert(html);
							  }
							});
							  
					});
					
					
				})
                </script>
                
                
                
                