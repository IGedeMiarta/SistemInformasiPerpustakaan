<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Peminjaman Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Home</a></li>
                        <li class="breadcrumb-item active">peminjaman</li>
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

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header text-center">
                        <h4><strong>Data Peminjaman Buku</strong></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover table-datatable">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>Kode Buku</th>
                                        <th>Peminjam</th>
                                        <th>Buku</th>
                                        <th>Mulai Pinjam</th>
                                        <th>Batas Pinjam</th>
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
                                            <td><?php echo $p->Id_detail; ?></td>
                                            <td><?php echo $p->nama; ?></td>
                                            <td><?php echo $p->judul; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($p->peminjaman_tanggal_mulai)); ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($p->peminjaman_tanggal_sampai)); ?></td>
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
            </div>



            <!-- end -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->