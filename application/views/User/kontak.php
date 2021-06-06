 <section class="parallax_window_in" data-parallax="scroll" data-image-src="<?= base_url('asset/plugins/images/') ?>login-register.jpg" data-natural-width="1400" data-natural-height="800" style="Object-fit:cover;">
     <div id="sub_content_in">
         <h1>Dinas Parawisata <?= NAMA_KABUPATEN ?></h1>
         <p>
             "Dapatkan Semua informasi untuk menjelajahi Bima,mencari tempat, petunjuk, dan info"
             <img src="<?= base_url() ?>asset/user_/img/logo.png" class="col-md-4 col-sm-4 col-xs-8  col-md-push-4 col-sm-push-4 col-xs-push-2 "><br /><br />
         </p>
     </div>
     <!-- End sub_content -->
 </section>
 <!-- End section -->
 <!-- End SubHeader ============================================ -->
 <?php foreach ($data_dinas as $row) : ?>
     <div class="container margin_60_30">
         <div class="row">

             <div class="col-md-12">
                 <div class="box_style_general">
                     <div class="row">
                         <div class="col-md-4">
                             <h4>Dinas Parawisata <?= NAMA_KABUPATEN; ?></h4>
                             <p><?= $row->deskripsi; ?></p>
                         </div>
                         <div class="col-md-4">
                             <h4>Info Kontak</h4>
                             <p>
                                 <?= $row->alamat; ?>
                                 <br><?= $row->no_telp; ?>
                                 <br>
                                 <a href="#"><?= $row->email ?></a>
                             </p>
                         </div>
                         <div class="col-md-4">
                             <h4>Social Media</h4>
                             <p>
                                 <a href="#"><i class="icon-facebook"></i><?= $row->fb ?></a><br />
                                 <a href="#"><i class="icon-phone"></i><?= $row->wa ?></a><br />
                                 <a href="#"><i class="icon-instagram"></i><?= $row->ig ?></a><br />
                                 <a href="#"><i class="icon-youtube"></i><?= $row->yt ?></a><br />
                             </p>
                         </div>
                     </div>
                     <hr class="styled">
                 </div>
                 <!-- End box style 1-->
             </div>
             <!-- End col lg 9 -->


             <!--End aside -->
         </div>
         <!-- End row -->
     </div>
 <?php endforeach; ?>
 <!-- End container -->