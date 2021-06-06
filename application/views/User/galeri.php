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

        <div class="container margin_60">

            <!-- End main_title -->
            <div class="row magnific-gallery">
                <div class="main_title">
                    <h2>Beberapa <strong>Foto</strong> Untuk Referensimu</h2>
                    <p><?= $text_cover[1] ?></p>
                    <span><em></em></span>
                </div>
                <?php foreach ($data_galeri as $row) : ?>
                    <div class="col-sm-3">
                        <div class="img_wrapper">
                            <div class="img_container">
                                <a href="<?= base_url('uploads/') . $row->nama_file; ?>" title="<?= $row->judul; ?>">
                                    <img style="object-fit:cover;Object-position:rigth;height:200px;" src="<?= base_url('uploads/') . $row->nama_file; ?>" width="800" height="533" class="img-responsive" alt="">
                                    <div class="short_info">
                                        <h3><?= $row->judul; ?></h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- End img_wrapper -->
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- End row -->
            <hr>

            <!-- End row -->
        </div>
        <!-- End container -->
        <script src="<?= base_url('asset/user_/') ?>js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript">
            //$("header").attr("id","plain");
        </script>