 <section class="parallax_window_in" data-parallax="scroll" data-image-src="<?= base_url('asset/plugins/images/') ?>login-register.jpg" data-natural-width="1400" data-natural-height="1200" style="Object-fit:cover;">
     <div id="sub_content_in">
         <h1><?= $text_cover[0]; ?></h1>
         <p>
             "<?= $text_cover[1]; ?>"<br />
             <img src="<?= base_url() ?>asset/user_/img/logo.png" class="col-md-4 col-sm-4 col-xs-8  col-md-push-4 col-sm-push-4 col-xs-push-2 "><br /><br />
         </p>
     </div>
     <!-- End sub_content -->
 </section>


 <section class="bg_white margin_60_30">
     <div class="container">
         <div class="main_title">
             <h3>Topografi<strong>Kab</strong>BIMA</h3>
             <p>
                 Secara topografis wilayah Kabupaten Bima sebagian besar (70%) merupakan dataran tinggi bertekstur pegunungan sementara sisanya (30%) adalah dataran. Sekitar 14% dari proporsi dataran rendah tersebut merupakan areal persawahan dan lebih dari separuh merupakan lahan kering. Oleh karena keterbatasan lahan pertanian seperti itu dan dikaitkan pertumbuhan penduduk kedepan, akan menyebabkan daya dukung lahan semakin sempit. Konsekuensinya diperlukan transformasi dan reorientasi basis ekonomi dari pertanian tradisional ke pertanian wirausaha dan sektor industri kecil dan perdagangan. Dilihat dari ketinggian dari permukaan laut, Kecamatan Donggo merupakan daerah tertinggi dengan ketinggian 500 m dari permukaan laut, sedangkan daerah yang terendah adalah Kecamatan Sape dan Sanggar yang mencapai ketinggian hanya 5 m dari permukaan laut.
             </p>
             <span><em></em></span>
         </div>
     </div>
 </section>

 <section class="parallax_window_home bright">
     <div class="container">
         <div class="main_title">
             <h3>Bagaimana Cara Kerja<strong>VisitBima</strong></h3>
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

 <!-- SubHeader =============================================== -->
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
                 <i class="<?= $row->icon; ?>"></i>
                 <h3><?= $row->nama_kategori; ?></h3>
             </a>
         </div>
     <?php endforeach; ?>
 </div>
 </div>
 <!-- End container -->