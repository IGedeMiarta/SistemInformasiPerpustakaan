<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Petugas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('petugas') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Petugas</li>
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
                <div class="card-header">
                    <a href="<?php echo base_url() . 'admin/petugas_tambah' ?>" class='btn btn-sm btn-success pull-right'><i class="fa fa-plus"></i> Petugas Baru</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover table-datatable">
                            <thead>
                                <tr class="text-center text-uppercase">
                                    <th width="10px">No</th>
                                    <th width="10px">Foto</th>
                                    <th>nip</th>
                                    <th>Nama</th>
                                    <th>Jenkel</th>
                                    <th>No Hp</th>
                                    <th>Email</th>
                                    <th width="8%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($petugas as $a) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><img src="<?php echo base_url() . 'fileupload/petugas/' . $a->gambar; ?>" alt="gambar" class="brand-image img-circle elevation-3 align-center" style="opacity: .8" width="50px" height="50px">
                                        </td>
                                        <td><?php echo $a->nip; ?></td>
                                        <td><?php echo $a->nama; ?></td>
                                        <td class="text-center"><?php if ($a->jenkel == 'L') {
                                                                    echo 'Laki-laki';
                                                                } else if ($a->jenkel == 'P') {
                                                                    echo 'Perempuan';
                                                                } else {
                                                                    echo '-';
                                                                }

                                                                ?></td>
                                        <td><?php echo $a->no_hp; ?></td>
                                        <td><?php echo $a->email; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <strong>Opsi</strong>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?= base_url('admin/petugas_edit/') . $a->nip; ?>"><i class="fas fa-fw fa-edit"></i> Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="far fa-fw fa-trash-alt"></i> Hapus</a>
                                                </div>
                                            </div>

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