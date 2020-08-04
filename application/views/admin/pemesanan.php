<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pemesanan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin' ?>">Home</a></li>
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
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover table-datatable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Nis</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Judul Buku</th>
                                    <th width="10%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pemesanan as $b) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?php echo date('d F Y', strtotime($b->waktu_pesan)); ?></td>
                                        <td><?php echo $b->nis; ?></td>
                                        <td><?php echo $b->nama; ?></td>
                                        <td><?php echo $b->kelas; ?></td>
                                        <td><?php echo $b->judul; ?></td>
                                        <td class="text-center"><?php if ($b->status == 1) {
                                                                    echo "<div class='badge badge-danger text-italic'>menunggu konfirmasi</div>";
                                                                } else if ($b->status == 2) {
                                                                    echo "<div class='badge badge-warning'>menunggu antrian</div>";
                                                                } else if ($b->status == 3) {
                                                                    echo "<div class='badge badge-success'>buku siap diambil</div>";
                                                                } else if ($b->status == 4) {
                                                                    echo "<div class='badge badge-secondary'>pemesanan selesai</div>";
                                                                } else {
                                                                    echo "<div class='badge badge-secondary'>dibatalkan!</div>";
                                                                }

                                                                ?></td>

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