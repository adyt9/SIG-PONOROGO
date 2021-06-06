
<!DOCTYPE html>
<html>
<?php $this->load->view('front/head') ?>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
       <?php $this->load->view('front/nav') ?>




        </div>

  <div class="container">
     <div class="row">
         <div class="main_title">
             <h2>Beberapa <strong>Video</strong> Untuk Referensimu</h2>
             <p><?= $text_cover[1] ?></p>
             <span><em></em></span>
         </div>
         <div class="col-md-9" style="margin-top: 100px;;">
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

        <?php $this->load->view('front/footer') ?>
        </div>
        </div>



  <?php $this->load->view('front/script') ?>
</body>

</html>
