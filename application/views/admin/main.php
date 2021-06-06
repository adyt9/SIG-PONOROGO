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
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <span class="label label-success pull-right">Monthly</span>
                                    <h5>Views</h5>
                                </div>
                                <div class="ibox-content">
                                    <h1 class="no-margins">386,200</h1>
                                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                                    <small>Total views</small>
                                </div>
                            </div>
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