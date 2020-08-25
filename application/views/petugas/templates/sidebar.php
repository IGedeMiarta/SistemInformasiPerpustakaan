<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('petugas') ?>" class="brand-link">
        <img src="<?php echo base_url() . 'img/LogoSMP1.png' ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">smpn1seltim</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="card mt-3 pb-3 mb-3 d-flex align-center bg-transparent" style="width: 14.5rem;">
            <img src="<?php echo base_url() . 'fileupload/petugas/' . $sesi['gambar']; ?>" class="card-img-top" alt="foto">
            <div class="card-body text-center text-capitalize bg-transparent text-white">
                <strong><?= $sesi['nama']; ?><br></strong>
                <strong><?= $sesi['nip']; ?></strong>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('petugas'); ?>" class="nav-link">
                        <i class="nav-icon fa fa-fw fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-header">FEATURE</li>
                <li class="nav-item">
                    <a href="<?= base_url('petugas/anggota'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-users"></i>
                        <p>
                            Anggota
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('petugas/buku'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-book"></i>
                        <p>
                            Buku
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('petugas/peminjaman'); ?>" class="nav-link">
                        <i class="nav-icon fab fa-fw fa-buffer"></i>
                        <p>
                            Peminjaman
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('petugas/pemesanan/') ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-mail-bulk"></i>
                        <p>
                            Pemesanan
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
                            <a href="<?php echo base_url() . 'petugas/laporan_buku'; ?>" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Laporan Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'petugas/peminjaman_laporan'; ?>" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Laporan Peminajaman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() . 'petugas/laporan_pemesanan' ?>" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Laporan Pemesanan</p>
                            </a>
                        </li>
                    </ul>
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
                            <a href="#" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'petugas/ubah_password' ?>" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Ubah Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-caret-right nav-icon"></i>
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