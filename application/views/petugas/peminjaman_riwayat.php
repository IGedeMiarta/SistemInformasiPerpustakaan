<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Riwayat Peminjaman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas/peminjaman' ?>">Peminjaman</a></li>
                        <li class="breadcrumb-item active">Riwayat Peminjaman</li>
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

            <div class="card">
                <?php
                // $id_buku="0";
                foreach ($buku as $d) {
                }
                ?>
                <div class="card-header" style="max-width: 700px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url() . 'fileupload/buku/' . $d->gambar; ?>" class="card-img" alt="..." style="max-height: 250px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body bg-transparent">
                                <table class="table table-borderless">
                                    <tr>
                                        <td class="text-bold"> Judul</td>
                                        <td>:</td>
                                        <td class="text-bold"><?= $d->judul; ?></td>
                                    </tr>
                                    <tr>
                                        <td> Terbitan</td>
                                        <td>:</td>
                                        <td><?= $d->tahun; ?></td>
                                    </tr>
                                    <tr>
                                        <td> Penulis</td>
                                        <td>:</td>
                                        <td><?= $d->penulis; ?></td>
                                    </tr>
                                    <tr>
                                        <td> Penerbit</td>
                                        <td>:</td>
                                        <td><?= $d->penerbit; ?></td>
                                    </tr>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="text-bold">Riwayat Peminjaman</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover table-datatable">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Id Buku</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Batas Peminjaman</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($peminjaman as $p) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?= $p->Id_detail; ?></td>
                                        <td><?= $p->nama; ?></td>
                                        <td><?= $p->kelas; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($p->peminjaman_tanggal_mulai)); ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($p->peminjaman_tanggal_sampai)); ?></td>
                                        <td class="text-center" width="10px">
                                            <?php if ($p->peminjaman_status == 2) {
                                                echo "-";
                                            } else {
                                                echo date('d-m-Y', strtotime($p->tanggal_kembali));
                                            } ?></td>
                                        <td>
                                            <?php
                                            if ($p->peminjaman_status == "1") {
                                                echo "<div class='badge badge-success'>Selesai</div>";
                                            } else if ($p->peminjaman_status == "2") {
                                                echo "<div class='badge badge-warning'>Dipinjam</div>";
                                            }
                                            ?>
                                        </td>
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