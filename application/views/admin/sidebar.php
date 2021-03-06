<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?php echo base_url() . 'img/LogoSMP1.png' ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">smpn1seltim</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header">FEATURE</li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/petugas'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-users"></i>
                        <p>
                            Petugas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() . 'admin/buku' ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-book"></i>
                        <p>
                            Buku
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/peminjaman') ?>" class="nav-link">
                        <i class="nav-icon fab fa-fw fa-buffer"></i>
                        <p>
                            Peminjaman
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/pemesanan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-mail-bulk"></i>
                        <p>
                            Pemesanan Buku
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-poll-h"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'admin/laporan_buku' ?>" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Laporan Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'admin/lap_peminjaman' ?>" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Laporan Peminajaman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'admin/laporan_pemesanan' ?>" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Laporan Pemesanan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">USER</li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/ubah_password'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-unlock-alt"></i>
                        <p>
                            Ubah Password
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-sign-out-alt fa-fw"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>