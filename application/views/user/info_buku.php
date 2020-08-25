<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Home</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas' ?>">Home</a></li>
                        <li class="breadcrumb-item active">Info Buku</li>
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
            foreach ($info as $d) { ?>
                <div class="card">
                    <div class="row">
                        <div class="col">
                            <div class="card-header" style="max-width: 800px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="<?= base_url() . 'fileupload/buku/' . $d->gambar; ?>" class="card-img" style="max-width: 200px" alt="...">
                                    </div>
                                    <div class="col-lg">
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>Judul</th>
                                                    <td> : </td>
                                                    <td><?= $d->judul; ?></td>
                                                </tr>
                                                <tr class="mt-1">
                                                    <th>Penulis</th>
                                                    <td> : </td>
                                                    <td><?= $d->penulis; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Penerbit</th>
                                                    <td> : </td>
                                                    <td><?= $d->penerbit; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tahun</th>
                                                    <td> : </td>
                                                    <td><?= $d->tahun; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Stok</th>
                                                    <td> : </td>
                                                    <td><?= $d->stok; ?></td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <?php if ($d->stok >= 1) { ?>
                                    <marquee behavior="" direction="">
                                        <p class="text-dark">Buku Masih tersedia <?php echo $d->stok; ?> Buah, Silahkan Ke perpustakaan untuk membaca atau meminjam!
                                        </p>
                                    </marquee>
                                <?php } else { ?>
                                    <a href="<?php echo base_url() . 'user/pesan_buku?id_buku=' . $d->id_buku . '&nis=' . $sesi['nis']; ?>" class="btn btn-info btn-sm"><i class="fas fa-mail-bulk"> Order Buku</i></a>

                            </div>
                        </div>
                    </div>
                </div>
                <marquee behavior="" direction="">
                    <p class="text-dark">Persediaan Buku Sudah Habis, Anda dapat memesan buku agar saat buku tersedia dapat kami berikan informasi!
                    </p>
                </marquee>
            <?php } ?>
        <?php } ?>
        <div class="card">
            <div class="card-header">
                <h3>Informasi Detail Buku</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-datatable">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Gambar</th>
                                <th>Judul Buku</th>
                                <th>Tahun Terbit</th>
                                <th>Penulis</th>
                                <th class="text-center">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($buku as $b) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><img src="<?= base_url() . 'fileupload/buku/' . $b->gambar; ?>" alt="" width="100px" height="100px"></td>
                                    <td><?php echo $b->judul; ?></td>
                                    <td class="text-center"><?php echo $b->tahun; ?></td>
                                    <td><?php echo $b->penulis; ?></td>
                                    <td class="text-center"><?php echo $b->stok2; ?></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- end -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->