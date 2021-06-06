       <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu"><?php echo $nama_brand?></span></h3> </div>
                <ul class="nav" id="side-menu">
                    <li class="user-pro active">
                        <a href="#" class="waves-effect"><img src="<?php echo base_url("image/").$this->session->gambar;?>" alt="user-img" class="img-circle img-fluid" style="object-fit:cover;width: 37px;height: 37px;"> <span class="hide-menu"><?= $this->session->username;?></span>
                        </a>
                    </li>
                    <li><a href="<?php echo site_url("Admin")?>" class="waves-effect"><i class="ti-user"></i> <span class="hide-menu">Admin </span></a>
                    </li>
                    <li><a href="<?php echo site_url("Dashboard")?>" class="waves-effect"><i class="mdi mdi-apps fa-fw"></i> <span class="hide-menu">Beranda </span></a>
                    </li>
                    <li class="devider"></li>
                    <li> <a href="<?php echo site_url("Wisata")?>" class="waves-effect"><i class="mdi mdi-airballoon fa-fw"></i> <span class="hide-menu">Wisata</span></a>
                    </li>
                    <li> <a href="<?php echo site_url("Agenda")?>" class="waves-effect"><i class="mdi mdi-view-agenda fa-fw"></i> <span class="hide-menu">Agenda</span></a>
                    </li>
                    <li> <a href="<?php echo site_url('Fasilitas')?>" class="waves-effect"><i class="mdi mdi-ferry fa-fw"></i> <span class="hide-menu">Fasilitas</span></a>
                    </li>
                    <li> <a href="<?php echo site_url("Kategori")?>" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Kategori</span></a>
                    </li>
                    <li> <a href="<?php echo site_url("Video")?>" class="waves-effect"><i class="mdi mdi-video fa-fw"></i> <span class="hide-menu">Video</span></a>
                    </li>
                    <li> <a href="<?php echo site_url("Galeri")?>" class="waves-effect"><i class="mdi mdi-image fa-fw"></i> <span class="hide-menu">Galeri</span></a>
                    </li>
                    <li> <a href="<?php echo site_url("About")?>" class="waves-effect"><i class="mdi mdi-chart-bubble fa-fw"></i> <span class="hide-menu">Tentang Kami</span></a>
                    </li>
                    <li><a href="<?php echo site_url("Auth/logout")?>" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                    <li class="devider"></li>
                   </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
             	<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?php echo $judul?></h4> </div>
                    </div>
                    <!-- /.col-lg-12 -->
                
                
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                             <div class="row row-in">
                                  <div class="col-lg-3 col-sm-6 row-in-br">
                                    <ul class="col-in">
                                            <li>
                                                <span class="circle circle-md bg-danger"><i class="ti-clipboard"></i></span>
                                            </li>
                                            <li class="col-last"><h3 class="counter text-right m-t-15"><?= $jumlah_dt_wisata;?></h3></li>
                                            <li class="col-middle">
                                                <h4>Wisata</h4>
                                                <div class="progress">
                                                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> 
                                                      <span class="sr-only">40% Complete (success)</span> 
                                                  </div>
                                                </div>
                                            </li>
                                    </ul>
                                  </div>
                                  <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                                    <ul class="col-in">
                                            <li>
                                                <span class="circle circle-md bg-info"><i class="ti-wallet"></i></span>
                                            </li>
                                            <li class="col-last"><h3 class="counter text-right m-t-15"><?= $jumlah_dt_agenda;?></h3></li>
                                            <li class="col-middle">
                                                <h4>Agenda</h4>
                                                <div class="progress">
                                                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> 
                                                      <span class="sr-only">40% Complete (success)</span> 
                                                  </div>
                                                </div>
                                            </li>
                                            
                                    </ul>
                                  </div>
                                  <div class="col-lg-3 col-sm-6 row-in-br">
                                    <ul class="col-in">
                                            <li>
                                                <span class="circle circle-md bg-success"><i class=" ti-shopping-cart"></i></span>
                                            </li>
                                            <li class="col-last"><h3 class="counter text-right m-t-15"><?= $jumlah_dt_fasilitas;?></h3></li>
                                            <li class="col-middle">
                                                <h4>Fasilitas</h4>
                                                <div class="progress">
                                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> 
                                                      <span class="sr-only">40% Complete (success)</span> 
                                                  </div> 
                                                </div>
                                            </li>
                                            
                                    </ul>
                                  </div>
                                  <div class="col-lg-3 col-sm-6  b-0">
                                    <ul class="col-in">
                                            <li>
                                                <span class="circle circle-md bg-warning"><i class="fa fa-dollar"></i></span>
                                            </li>
                                            <li class="col-last"><h3 class="counter text-right m-t-15"><?= $jumlah_dt_fasilitas + $jumlah_dt_agenda + $jumlah_dt_wisata;?></h3></li>
                                            <li class="col-middle">
                                                <h4>Total</h4>
                                                <div class="progress">
                                                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> 
                                                      <span class="sr-only">40% Complete (success)</span> 
                                                  </div>
                                                </div>
                                            </li>
                                            
                                    </ul>
                                  </div>
                                </div>   
                        </div>
                    </div>
                    </div>
                