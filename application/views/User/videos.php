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

 <!-- End position -->

 <div class="container margin_60_30">
     <div class="row">
         <div class="main_title">
             <h2>Beberapa <strong>Video</strong> Untuk Referensimu</h2>
             <p><?= $text_cover[1] ?></p>
             <span><em></em></span>
         </div>
         <div class="col-md-9 col-md-push-2">
             <?php foreach ($data_video as $row) : ?>
                 <div class="strip_list wow fadeIn" data-wow-delay="0.1s">
                     <div class="row">
                         <div class="col-sm-6">
                             <!-- End tools i-->
                             <iframe src="<?= $row->url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                             <!--End img_wrapper-->
                         </div>
                         <div class="col-sm-6">
                             <h1><?= $row->judul; ?></h1>
                             <p><?= $row->deskripsi; ?></p>
                         </div>
                     </div>
                     <!--End row -->
                 </div>
             <?php endforeach; ?>
         </div>
         <!-- End col lg 9 -->
     </div>
     <!-- End Row-->
 </div>
 <!-- End container -->
 <script src="<?= base_url('asset/user_/') ?>js/jquery-2.2.4.min.js"></script>
 <script type="text/javascript">
     //$("header").attr("id","plain");
 </script>