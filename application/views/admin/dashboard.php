<!DOCTYPE html>
<html>

<?php $this->load->view('partials/head') ?>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom white-bg">
                <?php $this->load->view('partials/nav.php') ?>
            </div>
            <div class="wrapper wrapper-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Selamat datang di sistem informasi Parawisata</h1>
                        </div>
                    </div>

                </div>

            </div>
            <?php $this->load->view('partials/footer'); ?>

        </div>
    </div>
    <?php $this->load->view('partials/script') ?>

</body>

</html>