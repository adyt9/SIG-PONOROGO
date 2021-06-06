<nav class="navbar navbar-static-top" role="navigation">
    <div class="navbar-header">
        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <i class="fa fa-reorder"></i>
        </button>
        <a href="#" class="navbar-brand"><?= NAMA_APLIKASI ?></a>
    </div>
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="nav navbar-nav">
            <li class="<?= $this->uri->segment(1) == 'Dashboard' ? 'active' : '' ?>">
                <a aria-expanded="false" role="button" href="<?= site_url('Dashboard') ?>"> Beranda</a>
            </li>
            <?php if ($_SESSION['role'] == 'admin') { ?>
                <li class="<?= $this->uri->segment(1) == 'Wisata' ? 'active' : '' ?>">
                    <a aria-expanded="false" role="button" href="<?= site_url('Wisata') ?>"> Wisata</a>
                </li>
            <?php } ?>
            <?php if ($_SESSION['role'] == 'admin') { ?>
                <li class="<?= $this->uri->segment(1) == 'Fasilitas' ? 'active' : '' ?>">
                    <a aria-expanded="false" role="button" href="<?= site_url('Fasilitas') ?>"> Fasilitas</a>
                </li>
            <?php } ?>
            <?php if ($_SESSION['role'] == 'admin') { ?>
                <li class="<?= $this->uri->segment(1) == 'Galeri' ? 'active' : '' ?>">
                    <a aria-expanded="false" role="button" href="<?= site_url('Galeri') ?>"> Galeri</a>
                </li>
            <?php } ?>
            <?php if ($_SESSION['role'] == 'admin') { ?>
                <li class="<?= $this->uri->segment(1) == 'Video' ? 'active' : '' ?>">
                    <a aria-expanded="false" role="button" href="<?= site_url('Video') ?>"> Video</a>
                </li>
            <?php } ?>
            <?php if ($_SESSION['role'] == 'admin') { ?>
                <li class="<?= $this->uri->segment(1) == 'Kategori' ? 'active' : '' ?>">
                    <a aria-expanded="false" role="button" href="<?= site_url('Kategori') ?>"> Kategori</a>
                </li>
            <?php } ?>
            <?php if ($_SESSION['role'] == 'superadmin') { ?>
                <li class="<?= $this->uri->segment(1) == 'Log' ? 'active' : '' ?>">
                    <a aria-expanded="false" role="button" href="<?= site_url('Log') ?>"> Log</a>
                </li>
            <?php } ?>
            <?php if ($_SESSION['role'] == 'superadmin') { ?>
                <li class="<?= $this->uri->segment(1) == 'Admin' ? 'active' : '' ?>">
                    <a aria-expanded="false" role="button" href="<?= site_url('Admin') ?>"> Admin</a>
                </li>
            <?php } ?>
        </ul>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="<?= site_url('Auth/logout') ?>">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>
    </div>
</nav>