<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('user'); ?>" class="brand-link">
        <img src="<?php echo base_url() . 'img/LogoSMP1.png' ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">smpn1seltim</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="card mt-3 pb-3 mb-3 d-flex align-center bg-transparent" style="width: 14.5rem;">
            <img src="<?php echo base_url() . 'fileupload/user/' . $sesi['gambar']; ?>" class="card-img-top" alt="foto">
            <div class="card-body text-center text-capitalize bg-transparent text-white">
                <strong><?= $sesi['nama']; ?><br></strong>
                <a><?= $sesi['nis']; ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header">FEATURE</li>
                <li class="nav-item">
                    <a href="<?= base_url('user'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="<?= base_url('user/buku'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-book"></i>
                        <p>
                            Data Buku
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">

                    <a href="<?= base_url('user/pemesanan/') . $sesi['nis']; ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-mail-bulk"></i>
                        <p>
                            Data Pesanan
                        </p>
                    </a>
                </li>

                <li class="nav-header">USER</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-user"></i>
                        <p>
                            Akun
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('user/profile/') . $sesi['nis']; ?>" class="nav-link">
                                <i class="fas fa-user fa-sm fa-fw"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-fw"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>