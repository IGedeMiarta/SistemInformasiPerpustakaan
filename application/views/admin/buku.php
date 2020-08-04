<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Buku</li>
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
                        <table class="table table-bordered table-striped table-hover table-datatable align-center text-center">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Gambar</th>
                                    <th width="30%">Judul Buku</th>
                                    <th>Terbitan</th>
                                    <th width="20%">Penulis</th>
                                    <th width="10%">Penerbit</th>
                                    <th width="10%">Stok <small>(Tersedia/Total)</small></th>
                                    <th width="11%">Detail Buku</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($buku as $b) {
                                    // foreach($detail_buku as $dt){
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><img src="<?= base_url() . 'fileupload/buku/' . $b->gambar; ?>" alt="" width="100px" height="100px"></td>
                                        <td><?php echo $b->judul; ?></td>
                                        <td><?php echo $b->tahun; ?></td>
                                        <td><?php echo $b->penulis; ?></td>
                                        <td><?php echo $b->penerbit; ?></td>
                                        <td><?php echo $b->stok2; ?>/<?php echo $b->stok; ?></td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="<?php echo base_url() . 'admin/buku_detail/' . $b->id_buku; ?>"><i class="fas fa-external-link-alt"></i> Lihat</a>

                                        </td>
                                    </tr>
                                <?php
                                    // }
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