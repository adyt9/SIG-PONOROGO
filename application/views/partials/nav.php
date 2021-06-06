        <nav class="navbar-default navbar-static-side" role="navigation">
        	<div class="sidebar-collapse">
        		<ul class="nav metismenu" id="side-menu">
        			<li class="nav-header">
        				<div class="dropdown profile-element"> <span>
        						<img alt="image" style="width: 60px;" class="rounded-circle circle-border m-b-md" src="<?= base_url('uploads/' . $_SESSION['gambar']) ?>" />
        					</span>
        					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
        						<span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $_SESSION['username'] ?></strong>
        							</span> <span class="text-muted text-xs block"><?= $_SESSION['role'] ?><b class="caret"></b></span> </span> </a>
        					<ul class="dropdown-menu animated fadeInRight m-t-xs">
        						<li><a href="profile.html">Profile</a></li>
        						<li><a href="contacts.html">Contacts</a></li>
        						<li><a href="mailbox.html">Mailbox</a></li>
        						<li class="divider"></li>
        						<li><a href="<?= site_url('Auth/logout') ?>">Logout</a></li>
        					</ul>
        				</div>

        				<!-- <div class="dropdown profile-element"> <span>
        						<img alt="image" style="width: 50px;" class="img-circle" src="<?= base_url('uploads/' . $_SESSION['gambar']) ?>" />
        					</span>
        					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
        						<span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $_SESSION['username'] ?></strong>
        							</span> <span class="text-muted text-xs block"><?= $_SESSION['role'] ?> <b class="caret"></b></span> </span> </a>
        					<ul class="dropdown-menu animated fadeInRight m-t-xs">
        						<li><a href="profile.html">Profile</a></li>
        						<li><a href="contacts.html">Contacts</a></li>
        						<li><a href="mailbox.html">Mailbox</a></li>
        						<li class="divider"></li>
        						<li><a href="<?= site_url('Auth/logout') ?>">Logout</a></li>
        					</ul>
        				</div> -->
        				<div class="logo-element">
        					IN+
        				</div>
        			</li>
        			<li class="<?= $this->uri->segment(1) == 'Dashboard' ? 'active' : '' ?>">
        				<a aria-expanded="false" role="button" href="<?= site_url('Dashboard') ?>"> <i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
        			</li>
        			<?php if ($_SESSION['role'] == 'admin') { ?>
        				<li class="<?= $this->uri->segment(1) == 'Wisata' ? 'active' : '' ?>">
        					<a aria-expanded="false" role="button" href="<?= site_url('Wisata') ?>"><i class="fa fa-flag"></i> <span class="nav-label"> Wisata</span></a>
        				</li>
        			<?php } ?>
        			<?php if ($_SESSION['role'] == 'admin') { ?>
        				<li class="<?= $this->uri->segment(1) == 'Fasilitas' ? 'active' : '' ?>">
        					<a aria-expanded="false" role="button" href="<?= site_url('Fasilitas') ?>"><i class="fa fa-coffee"></i> <span class="nav-label">Fasilitas</span></a>
        				</li>
        			<?php } ?>
        			<?php if ($_SESSION['role'] == 'admin') { ?>
        				<li class="<?= $this->uri->segment(1) == 'Galeri' ? 'active' : '' ?>">
        					<a aria-expanded="false" role="button" href="<?= site_url('Galeri') ?>"><i class="fa fa-image"></i> <span class="nav-label">Galeri</span></a>
        				</li>
        			<?php } ?>
        			<?php if ($_SESSION['role'] == 'admin') { ?>
        				<li class="<?= $this->uri->segment(1) == 'Video' ? 'active' : '' ?>">
        					<a aria-expanded="false" role="button" href="<?= site_url('Video') ?>"><i class="fa fa-video-camera"></i> <span class="nav-label">Video</span></a>
        				</li>
        			<?php } ?>
        			<?php if ($_SESSION['role'] == 'admin') { ?>
        				<li class="<?= $this->uri->segment(1) == 'Kategori' ? 'active' : '' ?>">
        					<a aria-expanded="false" role="button" href="<?= site_url('Kategori') ?>"><i class="fa fa-clone"></i> <span class="nav-label">Kategori</span></a>
        				</li>
        			<?php } ?>

        			<?php if ($_SESSION['role'] == 'superadmin') { ?>
        				<li class="<?= $this->uri->segment(1) == 'Admin' ? 'active' : '' ?>">
        					<a aria-expanded="false" role="button" href="<?= site_url('Admin') ?>"><i class="fa fa-user-circle"></i> <span class="nav-label">Admin</span></a>
        				</li>
        			<?php } ?>
        			<?php if ($_SESSION['role'] == 'superadmin') { ?>
        				<li class="<?= $this->uri->segment(1) == 'Log' ? 'active' : '' ?>">
        					<a aria-expanded="false" role="button" href="<?= site_url('Log') ?>"><i class="fa fa-history"></i> <span class="nav-label">Log</span></a>
        				</li>
        			<?php } ?>
        			<li class="">
        				<a aria-expanded="false" role="button" href="<?= site_url('Auth/logout') ?>"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>
        			</li>
        		</ul>

        	</div>
        </nav>
