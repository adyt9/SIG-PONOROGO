<!DOCTYPE html>
<html>
<?php $this->load->view('front/head') ?>
<style type="text/css">
	.carousel-control {
	    position: absolute;
	    top: 40%;
	    left: 15px;
	    width: 40px;
	    height: 40px;
	    margin-top: -20px;
	    font-size: 60px;
	    font-weight: 100;
	    line-height: 23px;
	    color: #ffffff;
	    text-align: center;
	    background: #222222;
	    border: 3px solid #ffffff;
	    border-radius: 23px;
	    opacity: 0.5;
	    filter: alpha(opacity=50);
	}
	.carousel-control.right {
	    right: 15px;
	    left: auto;
	}
	.carousel-caption {
	    position: absolute;
	    right: 0;
	    bottom: 0;
	    left: 0;
	    padding: 15px;
	    background: #333333;
	    background: rgba(0, 0, 0, 0.75);
	}
	.carousel-caption p {
	    margin-bottom: 0;
		}

		@media screen and (max-width: 700px){
	     .carousel-caption p {
	        font-size: 13px;
	    }
	    .carousel-caption {
	    background: rgba(0, 0, 0, 0.55);
	    }
	    .carousel-control {
	        top: 20%;
    	}
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {
	   $(".carousel-inner").swiperight(function() {
	       $(this).parent().carousel('prev');
	   });
	   $(".carousel-inner").swipeleft(function() {
	       $(this).parent().carousel('next');
	   });
	});
</script>
<body class="top-navigation">
	<div id="wrapper">
		<div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom white-bg">
				<?php $this->load->view('front/nav') ?>
				<section class="parallax_window_in bg-success" data-parallax="scroll" data-image-src="<?= base_url('asset/plugins/images/') ?>login-register.jpg" data-natural-width="1400" style="Object-fit:cover;padding-top:20px;padding-bottom:20px;">
					<div id="sub_content_in">
						<h1 class="text-center"><?= $text_cover[0]; ?></h1>
						<p class="text-center">
							"<?= $text_cover[1]; ?>"<br />
							<!-- <h1 class="text-center"><?= NAMA_APLIKASI ?></h1> -->
							
						</p>
					</div>
					
					<!-- End sub_content -->
					
					<div id="sub_content_in">
						<div id="myCarousel" class="carousel slide" style="max-width: 1200px; margin: 0px auto;">
				            <ol class="carousel-indicators hidden-xs hidden-sm" style="padding-bottom: 32px;">
				            	<?php 
				            		$i = 0;
				            		foreach ($data_slider as $row) {
				            	 ?>
					                <li data-target="#carcousel-generic" data-slide-to="<?php echo $i; ?>" <?php if($i==0){ ?>class="active" <?php } ?>></li>
					            <?php
					            	$i++; 
					        	} ?>
				            </ol>
				            <div class="carousel-inner">
				            	 <?php
				           			$j = 0; 
				            	 	foreach ($data_slider as $row) {
				            	 ?>
					                <div <?php if($j==0){ ?> class="active item"  <?php }else{ ?> class="item" <?php } ?> align="center"><a href="#"><img style="height:500px" src="<?php echo base_url('uploads/') . $row->nama_file; ?>"></a>
					                    <div class="carousel-caption">
					                        <h3><?php echo $row->judul; ?></h3>
					                        <p><?php echo $row->deskripsi; ?></p>
					                    </div>
					                </div>
				            	<?php 
				            		$j++; 
				            	} ?>
				            </div>
				            <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
				            <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
				        </div>
					</div>
				</section>

			</div>
			<div class="wrapper wrapper-content">
				<div class="container">
					<section class="parallax_window_home bright">
						<div class="container">
							<div class="main_title">
								<h3>Bagaimana Cara Kerja <strong> Visit Ponorogo</strong></h3>
							</div>
							<div class="row features add_bottom_45">
								<div class="col-sm-4">
									<div id="feat_2">
										<h3>Mencari Lokasi</h3>
										<p>
											Dapatkan informasi mengenai lokasi menarik, desa wisata, rumah makan, dan lain-lain
										</p>
									</div>
								</div>
								<div class="col-sm-4">
									<div id="feat_1">
										<h3>Informasi Agenda</h3>
										<p>
											Dapatkan Informasi Agenda Wisata
										</p>
									</div>
								</div>
								<div class="col-sm-4">
									<div id="feat_3">
										<h3>Ulasan Destinasi Wisata</h3>
										<p>
											Ulasan Singkat Mengenai Destinasi Wisata
										</p>
									</div>
								</div>
							</div>
						</div>
						<!-- End row -->
						<div class="text-center">
							<a href="<?= site_url('User/peta'); ?>" class="button_2">Start Explore</a>
						</div>
					</section>

					<div class="main_title" style="margin-top:30px;">
						<h2><strong>Explore</strong> what's interesting</h2>
						<p>
							Pilihan destinasi wisatamu ada dibawah ini, silahkan tekan untuk memulai wisata !
						</p>
						<span><em></em></span>
					</div>
					<div class="box_cat">
						<?php foreach ($data_kategori as $row) : ?>
							<div class="col-md-3 col-sm-6">
								<a href="<?= site_url('User/wisata/') . $row->id_kategori; ?>">
									
									<h3><i class="<?= $row->icon; ?>"></i> <?= $row->nama_kategori; ?></h3>
								</a>
							</div>
						<?php endforeach; ?>
					</div>

				</div>

			</div>
			<?php $this->load->view('front/footer') ?>
		</div>
	</div>
	<?php $this->load->view('front/script') ?>
</body>

</html>
