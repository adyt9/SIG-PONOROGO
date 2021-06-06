 <section class="parallax_window_in" data-parallax="scroll" data-image-src="<?= base_url('asset/plugins/images/')?>login-register.jpg" data-natural-width="1400" data-natural-height="800" style="Object-fit:cover;">
        <div id="sub_content_in">
            <h1>Dinas Parawisata <?=NAMA_KABUPATEN?></h1>
            <p>
                "Dapatkan Semua informasi untuk menjelajahi Bima,mencari tempat, petunjuk, dan info"
        <img src="http://localhost/sip_bima/asset/user_/img/logo.png" class="col-md-4 col-sm-4 col-xs-8  col-md-push-4 col-sm-push-4 col-xs-push-2 "><br/><br/>
            </p>
        </div>
        <!-- End sub_content -->
    </section>

    <!-- End position -->

    <div class="container margin_60_30">
        <div class="row">
        <div class="main_title">
            <h2>Hasil <strong>Pencarian</strong> Untuk Referensimu</h2>
            <p><?= $text_cover[1]?></p>
            <span><em></em></span>
        </div>
            <div class="col-md-9 col-md-push-2">
           <?php foreach($data_wisata as $row):?>
                    <div class="col-lg-6 col-md-12 col-sm-6">
                        <div class="img_wrapper">
                            
                            <div class="tools_i">
                                <div class="directions_list_map" onclick="onHtmlClick('<?= $row->longitude?>','<?= $row->latitude?>');return false;">
                                    <a class="tooltip_styled tooltip-effect-4"><span class="tooltip-item"></span>
								<div class="tooltip-content">View on map</div>
								</a>
                                </div>
                            </div>
                            <!-- End tool_i -->
                            <div class="img_container">
                                <a href="<?= site_url('User/detail_wisata/').$row->id_wisata;?>">
                                     <img src="<?= base_url('image/').$row->id_gambar;?>" width="800" style="object-fit: cover;height: 200px;" class="img-responsive" alt="">
                                    <div class="short_info">
                                        <h3><?= $row->nama_wisata;?></h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- End img_wrapper -->
                    </div>
                    <script type="text/javascript">
                    	cordx.push({'kordinat_lng': <?= $row->longitude?>,'kordinat_lat':<?= $row->latitude?>,'nama_wisata':"<?= $row->nama_wisata?>",'deskripsi':"<?= $row->deskripsi?>",'icon':"<?= $row->icon?>"});
                    </script>
                    <?php endforeach;?>
            <?php foreach($data_video as $row):?>
                <div class="strip_list wow fadeIn" data-wow-delay="0.1s">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="img_wrapper">
                                <!-- End tools i-->
                                <div class="">
                        <div class=''>
	                 <video id="video_p" poster="<?= base_url('image/').$row->cover; ?>"  height="200" style="object-fit:cover;object-position:bottom;" controls><source width="200" id="video_wisata" src="<?= base_url('video/').$row->nama_video; ?>" type="video/mp4">
                     </video>
                        </div>
                                </div>
                            </div>
                            <!--End img_wrapper-->
                        </div>
                        <div class="col-sm-6">
                            <div class="desc">
                                <h1><b></b>"<?= $row->judul;?>"</b></h1>
                                <p><?= $row->deskripsi;?></p>
                                <br/>
                            </div>
                        </div>
                    </div>
                    <!--End row -->
                </div>
                <?php endforeach;?>
                
                 <?php foreach($data_agenda as $row):?>
                    <div class="col-lg-6 col-md-12 col-sm-6">
                        <div class="img_wrapper">
                            
                            <div class="tools_i">
                                <div class="directions_list_map" onclick="onHtmlClick('<?= $row->longitude?>','<?= $row->latitude?>');return false;">
                                    <a class="tooltip_styled tooltip-effect-4"><span class="tooltip-item"></span>
								<div class="tooltip-content">Lihat Peta</div>
								</a>
                                </div>
                            </div>
                            <!-- End tool_i -->
                            <div class="img_container">
                                <a href="<?= site_url('User/detail_agenda/').$row->id_agenda;?>">
                                     <img src="<?= base_url('image/').$row->gambar;?>" width="800" style="object-fit: cover;height: 200px;" class="img-responsive" alt="">
                                    <div class="short_info">
                                        <h3><?= $row->judul_agenda;?></h3>
                                        <em><span class="icon-calender"></span><?= $row->tanggal_mulai;?><?php if($row->tanggal_berakhir !='') echo ' - '.$row->tanggal_mulai; ?></em>
                                        <em><?= $row->waktu_mulai;?></em>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- End img_wrapper -->
                    </div>
                    <script type="text/javascript">
                    	cordx.push({'kordinat_lng': <?= $row->longitude?>,'kordinat_lat':<?= $row->latitude?>,'nama_wisata':"<?= $row->judul_agenda?>",'deskripsi':"<?= $row->deskripsi?>",'icon':"circle","waktu": "<?= $row->waktu_mulai?> - <?= $row->waktu_selesai?>"});
                    </script>
                    <?php endforeach;?>
            </div>
            <!-- End col lg 9 -->
        </div>
        <!-- End Row-->
    </div>
    <!-- End container -->
    <script src="<?= base_url('asset/user_/')?>js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
		//$("header").attr("id","plain");
	</script>
