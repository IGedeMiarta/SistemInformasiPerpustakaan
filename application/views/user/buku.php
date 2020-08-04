<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('user') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Buku</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- begin -->
            <div class="container-fluid">
                <div class="container-fluid">

                    <div class="container-fluid">
                        <div class="card">

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
                                                <th>Stok</th>
                                                <th>Opsi</th>
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
                                                    <td><?php echo $b->tahun; ?></td>
                                                    <td><?php echo $b->penulis; ?></td>
                                                    <td class="text-center"><?php echo $b->stok2; ?></td>
                                                    <td class="text-center"><?php if ($b->stok2 == 0) { ?>
                                                            <a href="#" data-toggle="modal" data-target=" #pemesananModal<?php echo $id_buku = $b->id_buku; ?>" class="badge badge-info"><i class="fa fa-plus"> Order</i></a>
                                                        <?php } else {
                                                                                echo "-";
                                                                            } ?></td>
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

                </div>
            </div>



            <!-- modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="pemesananModal<?php echo $id_buku; ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?php echo base_url() . 'user/pemesanan_aksi' ?>">

                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Id Buku</span>
                                        </div>
                                        <input type="text" class="form-control" name="id_buku" value="<?= $id_buku; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Pemesan</span>
                                        </div>
                                        <input type="text" class="form-control" name="nis" value="<?= $sesi['nis']; ?>">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Order</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->