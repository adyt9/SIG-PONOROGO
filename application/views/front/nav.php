 <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="#" class="navbar-brand"><?= NAMA_APLIKASI ?></a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="<?= current_url() == site_url('User/index') ? 'active' : ''?>">
                        <a aria-expanded="false" role="button" href="<?= site_url('User/index') ?>"> Beranda</a>
                    </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Wisata<span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                        <?php foreach($data_kategori as $kategori){ ?>
                            <li><a href="<?= site_url('User/wisata/'.$kategori->id_kategori) ?>"><?= $kategori->nama_kategori ?></a></li>
                        <?php } ?>
                        </ul>
                    </li>
                    <li class="<?= current_url() == site_url('User/fasilitas') ? 'active' : ''?>">
                        <a aria-expanded="false" role="button" href="<?= site_url('User/fasilitas') ?>"> Fasilitas</a>
                    </li>
                  
                    <li class="<?= current_url() == site_url('User/galeri') ? 'active' : ''?>">
                        <a aria-expanded="false" role="button" href="<?= site_url('User/galeri') ?>"> Galeri</a>
                    </li>
                    <li class="<?= current_url() == site_url('User/videos') ? 'active' : ''?>">
                        <a aria-expanded="false" role="button" href="<?= site_url('User/videos') ?>"> Video</a>
                    </li>
                    <li class="<?= current_url() == site_url('User/peta') ? 'active' : ''?>">
                        <a aria-expanded="false" role="button" href="<?= site_url('User/peta') ?>"> Peta</a>
                    </li>
                    <li class="<?= current_url() == site_url('User/kontak') ? 'active' : ''?>">
                        <a aria-expanded="false" role="button" href="<?= site_url('User/kontak') ?>"> Tentang Kami</a>
                    </li>
                    <li>
                        <a aria-expanded="false" role="button" href="<?= site_url('Dashboard') ?>"> Login</a>
                    </li>
                </ul>
            </div>
        </nav>