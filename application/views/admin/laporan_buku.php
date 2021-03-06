<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Laporan Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas' ?>">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Buku</li>
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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h6>Filter Berdasarkan Tanggal</h6>
                                </div>
                                <div class="card-body">

                                    <form method="get" action="">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="tanggal_mulai">Tanggal Mulai</label>
                                            <input type="date" class="form-control" name="tanggal_mulai" placeholder="Masukkan tanggal mulai pinjam">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="tanggal_sampai">Tanggal Sampai</label>
                                            <input type="date" class="form-control" name="tanggal_sampai" placeholder="Masukkan tanggal pinjam sampai">
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Filter">
                                    </form>

                                </div>

                            </div>
                        </div>

                    </div>
                    <?php
                    // membuat tombol cetak jika data sudah di filter
                    if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
                        $mulai = $_GET['tanggal_mulai'];
                        $sampai = $_GET['tanggal_sampai'];
                    ?>
                        <a class='btn btn-primary' target="_blank" href='<?php echo base_url() . 'admin/laporan_buku_cetak?tanggal_mulai=' . $mulai . '&tanggal_sampai=' . $sampai ?>'><i class='fa fa-print'></i> CETAK</a>
                    <?php
                    }
                    ?>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover table-datatable">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Tanggal Masuk</th>
                                    <th>ID Buku</th>
                                    <th>Id Detail Buku</th>
                                    <th>Buku</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($book as $b) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($b->tgl_masuk)); ?></td>
                                        <td><?php echo $b->id_buku ?></td>
                                        <td><?php echo $b->id_detail; ?></td>
                                        <td><?php echo $b->judul; ?></td>
                                        <td><?php echo $b->ket; ?></td>
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