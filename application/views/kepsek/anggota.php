<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Anggota</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('kepsek') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Anggota</li>
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
                                <tr class="text-center text-uppercase">
                                    <th>No</th>
                                    <th width="10px">Foto</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Jenkel</th>
                                    <th>Kelas</th>
                                    <th>Alamat</th>
                                    <th width="5%">Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($anggota as $a) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><img src="<?php echo base_url() . 'fileupload/user/' . $a->gambar; ?>" alt="gambar" class="brand-image img-circle elevation-3 align-center" style="opacity: .8" width="50px" height="50px">
                                        </td>
                                        <td><?php echo $a->nis; ?></td>
                                        <td><?php echo $a->nama; ?></td>
                                        <td class="text-center"><?php if ($a->jenkel == 'L') {
                                                                    echo 'Laki-laki';
                                                                } else if ($a->jenkel == 'P') {
                                                                    echo 'Perempuan';
                                                                } else {
                                                                    echo '-';
                                                                }

                                                                ?></td>
                                        <td><?php echo $a->kelas; ?></td>
                                        <td><?php echo $a->alamat; ?></td>
                                        <td><?php
                                            if ($a->is_active == 'Y') {
                                                echo "<div class='badge badge-success'>Aktif</div>";
                                            } else {
                                                echo "<div class='badge badge-warning'>Tidak Aktif</div";
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