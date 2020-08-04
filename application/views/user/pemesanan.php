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
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'user' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'user/pesan' ?>">Pemesanan</a></li>
                        <li class="breadcrumb-item active">Pesan Buku</li>
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
                <br>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url() . 'user/pemesanan_aksi/' . $sesi['nis']; ?>">

                        <div class="form-group">
                            <div class="form-group">
                                <input type="number" class="form-control" name="nis" placeholder="<?php $sesi['nis'];  ?>" required="required" value="<?php echo $sesi['nis']; ?>" hidden>
                            </div>
                            <div class="input-group mb-3">
                                <input id="id_buku" name="id_buku" type="text" class="form-control" placeholder="Cari Buku" aria-label="Judul Buku" aria-describedby="basic-addon2" required="required">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> Cari</button>
                                </div>
                            </div>
                        </div>

                        <br>

                        <input type="submit" class="btn btn-success pull-right" value="Tambah">
                        <br /><br />
                    </form>
                </div>
            </div>

            <!-- modal -->
            <div id="myModal" class="modal fade" role="dialog" width: 75%>
                <div class="modal-dialog modal-lg">
                    <!-- konten modal-->
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- body modal -->
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover table-datatable" id="table">
                                    <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th>Kode Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Tahun Terbit</th>
                                            <th>Penulis</th>
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
                                                <td><?php echo $b->id_buku; ?></td>
                                                <td><?php echo $b->judul; ?></td>
                                                <td><?php echo $b->tahun; ?></td>
                                                <td><?php echo $b->penulis; ?></td>
                                                <td><a id="btnTambah" onclick="tambahBuku();" class='btn btn-sm btn-primary'><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            </>
                            <!-- footer modal -->

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