<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Info Pemesanan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'user' ?>">Home</a></li>
                        <li class="breadcrumb-item active">Pemesanan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- start -->
            <?php
            if ($pesan === null) { ?>
                <div class="text-center">
                    <img src="<?php echo base_url() . 'fileupload/404.png' ?>" alt="">
                    <h1>Anda Belum Memesan!</h1>
                </div>
            <?php } else { ?>
                <?php echo $this->session->flashdata('messege'); ?>
                <div class='card'>
                    <div class="row">
                        <?php foreach ($pemesanan as $p) { ?>
                            <div class="col-md-6">
                                <div class="card mb-3 ml-4 mt-4 bg-light" style="max-width: 540px;">

                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="<?= base_url() . 'fileupload/buku/' . $p->gambar; ?>" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <?php if ($p->status == 3) { ?>
                                                <div class="alert alert-warning alert-dismissible fade show mb-n3" role="alert">
                                                    <?php
                                                    $cek = $this->db->query("SELECT * FROM peminjaman, detail_buku WHERE peminjaman_buku=id_detail AND detail_buku.status=3 GROUP BY id_detail")->result();
                                                    foreach ($cek as $c) {
                                                        $tanggal_s = date("Y-m-d", strtotime("$c->tanggal_kembali + 2 days"));
                                                    }
                                                    ?>
                                                    <small>Konfirmasi Sebelum <strong><?php echo date('d-M-Y', strtotime($p->batas_pesan)); ?></strong></small>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div> <?php  } else if ($p->status == 5) { ?>
                                                <div class="alert alert-danger alert-dismissible fade show mb-n3" role="alert">
                                                    <small>Pesanan <strong>dibatalkan!</strong>, tidak konfirmasi</small>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php  } ?>
                                            <div class="card-body">

                                                <h5 class="card-title text-bold"><?= $p->judul; ?></h5>
                                                <br></br>
                                                <?php

                                                $info1 = $this->db->query("SELECT * FROM peminjaman,anggota 
                                                                WHERE peminjaman.peminjaman_anggota=anggota.nis
                                                                AND peminjaman_buku LIKE '%$p->id_buku%'
                                                                AND peminjaman_status=2 LIMIT 1")->result();
                                                ?>
                                                <table>

                                                    <?php
                                                    foreach ($info1 as $info) {
                                                        if ($p->status <= 3) {
                                                    ?>
                                                            <tr>
                                                                <td>Sedang Dipinjam</td>
                                                                <td>:</td>
                                                                <td><?php if ($info->nama !== null) {
                                                                        echo $info->nama;
                                                                    } else {
                                                                        echo "-";
                                                                    } ?></td>
                                                            <tr>
                                                                <td>Kembali Sebelum</td>
                                                                <td>:</td>
                                                                <td><?php
                                                                    $tanggal = date('d-m-Y', strtotime($info->peminjaman_tanggal_sampai));
                                                                    if ($tanggal === null) {
                                                                        echo "-";
                                                                    } else {
                                                                        echo $tanggal;
                                                                    }  ?></td>
                                                            </tr>
                                                    <?php }
                                                    } ?>
                                                </table>
                                                </br>
                                                <table>
                                                    <tr>
                                                        <td>Nama Pemesan</td>
                                                        <td>:</td>
                                                        <td><?= $p->nama; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kelas</td>
                                                        <td>:</td>
                                                        <td><?= $p->kelas; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Waktu Pesan</td>
                                                        <td>:</td>
                                                        <td><?= date('H:i', strtotime($p->waktu_pesan)); ?>, <?= date('d-m-Y', strtotime($p->waktu_pesan)); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?php if ($p->status == 1) {
                                                                echo "<div class='badge badge-danger text-italic'>menunggu konfirmasi</div>";
                                                            } else if ($p->status == 2) {
                                                                echo "<div class='badge badge-warning'>menunggu antrian</div>";
                                                            } else if ($p->status == 3) {
                                                                echo "<div class='badge badge-success'>buku siap diambil</div>";
                                                            } else if ($p->status == 4) {
                                                                echo "<div class='badge badge-secondary'>pemesanan selesai</div>";
                                                            } else {
                                                                echo "<div class='badge badge-secondary'>dibatalkan!</div>";
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>




            <!-- end -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->