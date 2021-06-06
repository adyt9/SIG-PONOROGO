
<!DOCTYPE html>
<html>
<?php $this->load->view('front/head') ?>
<style type="text/css">
    .btn:focus, .btn:active, button:focus, button:active {
      outline: none !important;
      box-shadow: none !important;
    }

    #image-gallery .modal-footer{
      display: block;
    }

    .thumb{
      margin-top: 15px;
      margin-bottom: 15px;
    }
</style>

</script>
<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
       <?php $this->load->view('front/nav') ?>
        </div>

    <div class="container">
        <div class="row magnific-gallery">
            <div class="main_title">
                <h2>Beberapa <strong>Foto</strong> Untuk Referensimu</h2>
                <p><?= $text_cover[1] ?></p>
                <span><em></em></span>
            </div>
            <?php foreach ($data_galeri as $row) : ?>
                
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail hehe" href="#" data-toggle="modal" onclick="dataModal('<?php echo $row->judul; ?>','<?php echo base_url('uploads/') . $row->nama_file; ?>')" data-title="<?= $row->judul; ?>" data-image="<?= base_url('uploads/') . $row->nama_file; ?>" data-target="#image-gallery">
                        <img class="img-thumbnail" src="<?= base_url('uploads/') . $row->nama_file; ?>">
                    </a>
                </div>
            <?php endforeach; ?>
            <script type="text/javascript">
                function dataModal (title,url) {
                     document.getElementById("image-gallery-title").innerHTML = title;
                     document.getElementById("image-gallery-image").src = url;
                };
            </script>
            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="height:650px">
                        <div class="modal-header">
                            <h4 class="modal-title" id="image-gallery-title"></h4>
                        </div>
                        <div class="modal-body">
                            <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <?php $this->load->view('front/footer') ?>
        </div>
        </div>



  <?php $this->load->view('front/script') ?>
</body>

</html>
