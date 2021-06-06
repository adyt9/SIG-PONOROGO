<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title><?= $judul; ?></title>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.css' rel='stylesheet' />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300" rel="stylesheet" type="text/css">

    <!-- BASE CSS -->
    <link href="<?= base_url('asset/user_/'); ?>css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('asset/user_/'); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('asset/user_/'); ?>css/magnific-popup.min.css" rel="stylesheet">
    <link href="<?= base_url('asset/user_/'); ?>css/style.css" rel="stylesheet">
    <link href="<?= base_url('asset/user_/'); ?>css/menu.css" rel="stylesheet">
    <link href="<?= base_url('asset/user_/'); ?>css/icon_fonts/css/all_icons.min.css" rel="stylesheet">
    <link href="<?= base_url('asset/user_/'); ?>css/pop_up.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="<?= base_url('asset/user_/'); ?>css/custom.css" rel="stylesheet">

    <!-- Modernizr -->
    <script src="<?= base_url('asset/user_/'); ?>js/modernizr.js"></script>
    <style type="text/css">
        .marker {
            font-size: 16px;
            color: #c8497c;
        }

        /* Marker tweaks */
        .mapboxgl-popup-close-button {
            display: none;
        }

        .mapboxgl-popup-content {
            font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', Sans-serif;
            padding: 0;
            width: 272px;
            background-color: #000000e6;
            border-radius: 7px;
            position: absolute;
            bottom: -177px;
        }

        .mapboxgl-popup-tip {
            /* matrix(rotate(),translate()); */
            left: 34px;
            top: 14px;
            position: absolute;
            border-top-color: #000000e6 !important;
            -ms-transform: rotate(90deg);
            /* Support IE 9 */
            -webkit-transform: rotate(90deg);
            /* support Safari */
            transform: rotate(90deg);
            /* Standard syntax */
        }

        .mapboxgl-popup-content-wrapper {
            padding: 1%;
        }

        .mapboxgl-popup-content img {
            object-fit: cover;
            height: 150px;
        }

        .mapboxgl-ctrl-top-right {
            top: 80px;
        }

        /* .mapboxgl-popup-content h3 {
          background: #c8497c;
          color: #fff;
          margin: 0;
          display: block;
          border-radius: 3px 3px 0 0;
          font-weight: 700;
          margin-top: -15px;
        } */
        #marker-info h3,
        em,
        p,
        strong {
            padding-left: 11px;
            padding-right: 11px;
        }

        #marker-info strong {
            display: block;
        }

        .mapboxgl-popup-content {
            margin: 17px;
            left: 32px;
            color: #fff;
        }

        .mapboxgl-popup-content h3 {
            margin-bottom: 10px;
            font-size: 15px;
            text-transform: uppercase;
            font-weight: bold;
            color: white;
        }

        .mapboxgl-popup-content em {
            margin-bottom: 3px;
            color: #656565;
            display: block;
            font-size: 11px;
            top: -28px;
            line-height: 1.5;
        }

        .mapboxgl-popup-content h4 {
            margin: 0;
            display: block;
            font-weight: 400;
        }

        .mapboxgl-popup-content div {}

        .mapboxgl-container .leaflet-marker-icon {
            cursor: pointer;
        }

        .mapboxgl-popup-anchor-top>.mapboxgl-popup-content {
            margin-top: -15px;
        }

        .mapboxgl-popup-anchor-top>.mapboxgl-popup-tip {
            border-bottom-color: #fff;
            margin-top: 15px;
        }

        .mapbox-directions-route-summary h1 {
            color: white;
        }

        <style>.map-overlay {
            font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
            position: absolute;
            width: 200px;
            top: 0;
            left: 0;
            padding: 10px;
        }

        .map-overlay .map-overlay-inner {
            background-color: #fff;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            border-radius: 3px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .map-overlay-inner fieldset {
            border: none;
            padding: 0;
            margin: 0 0 10px;
        }

        .map-overlay-inner fieldset:last-child {
            margin: 0;
        }

        .map-overlay-inner select {
            width: 100%;
        }

        .map-overlay-inner p {
            margin: 0;
        }

        .map-overlay-inner label {
            display: block;
            font-weight: bold;
        }

        .map-overlay-inner button {
            background-color: cornflowerblue;
            color: white;
            border-radius: 5px;
            display: inline-block;
            height: 20px;
            border: none;
            cursor: pointer;
        }

        .map-overlay-inner button:focus {
            outline: none;
        }

        .map-overlay-inner button:hover {
            background-color: blue;
            box-shadow: inset 0 0 0 3px rgba(0, 0, 0, 0.1);
            -webkit-transition: background-color 500ms linear;
            -ms-transition: background-color 500ms linear;
            transition: background-color 500ms linear;
        }

        .offset>label,
        .offset>input {
            display: inline;
        }

        #animateLabel {
            display: inline-block;
            min-width: 20px;
        }
    </style>
    </style>
    <!-- Favicons-->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!--[if lte IE 8]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
    <![endif]-->

    <div class="layer"></div>
    <!-- Menu mask -->

    <!-- Header ================================================== -->
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col--md-4 col-sm-3 col-xs-4">
                    <div id="logo_home">
                        <h1><a href="<?= site_url() ?>" title="TravelGuide template">TravelGuide template</a></h1>
                    </div>
                </div>
                <nav class="col--md-8 col-sm-9 col-xs-8">
                    <ul id="primary_nav">
                        <li id="login"><a href="<?= site_url('Dashboard') ?>">Login</a>
                        </li>
                        <li id="search">
                            <div class="dropdown dropdown-search">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-search"></i></a>
                                <div class="dropdown-menu">
                                    <form method="post" action="<?= site_url('User/search'); ?>">
                                        <div id="custom-search-input-header">
                                            <input type="text" name="search" class="form-control" placeholder="Search...">
                                            <input type="submit" class="btn_search_2" value="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                    <div class="main-menu">
                        <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
                        <ul>
                            <li class="submenu">
                                <a href="<?= site_url('User/index') ?>" class="show-submenu">Beranda</a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Wisata<i class="icon-down-open-mini"></i></a>
                                <ul>
                                    <?php foreach ($data_kategori as $row) : ?>
                                        <li><a href="<?= site_url('User/Wisata/') . $row->id_kategori; ?>"><?= $row->nama_kategori; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <!-- <li class="submenu ">
                                <a href="<?= site_url('User/Agenda') ?>" class="show-submenu">Agenda</a>
                            </li> -->
                            <li class="submenu">
                                <a href="<?= site_url('User/fasilitas') ?>" class="show-submenu">Fasilitas</a>
                            </li>
                            <li class="submenu">
                                <a href="<?= site_url('User/galeri') ?>" class="show-submenu">Galeri</a>
                            </li>
                            <li class="submenu">
                                <a href="<?= site_url('User/videos') ?>" class="show-submenu">Video</a>
                            </li>
                            <li class="submenu">
                                <a href="<?= site_url('User/peta') ?>" class="show-submenu">Peta</a>
                            </li>
                            <li class="submenu">
                                <a href="<?= site_url('User/kontak') ?>" class="show-submenu">Tentang Kami</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End main-menu -->
                </nav>
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </header>
    <!-- End Header =============================================== -->