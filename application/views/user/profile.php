<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'user' ?>">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
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
                <div class="row">
                    <?php foreach ($anggota as $a) { ?>
                        <div class="col-md-2 mt-5">
                            <img src="<?= base_url() . 'fileupload/user/' . $a->gambar; ?>" alt="foto" style="max-height: 200px">
                        </div>
                        <div class="col-md-4">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="100px">Nama</th>
                                    <td width="1px">:</td>
                                    <td><?= $a->nama; ?></td>
                                </tr>
                                <tr>
                                    <th>Nis</th>
                                    <td>:</td>
                                    <td><?= $a->nis; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Kel</th>
                                    <td>:</td>
                                    <td><?php if ($a->jenkel == 'L') {
                                            echo "Laki-Laki";
                                        } elseif ($a->jenkel == 'P') {
                                            echo "Perempuan";
                                        } else
                                            echo "-";
                                        ?></td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>:</td>
                                    <td><?php if ($a->kelas === null) {
                                            echo "-";
                                        } else {
                                            echo $a->kelas;
                                        } ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>:</td>
                                    <td><?= $a->alamat; ?></td>
                                </tr>
                                <tr>
                                    <th>Tempat, tgl lahir</th>
                                    <td>:</td>
                                    <td><?= $a->tempat_lahir; ?>, <?= date('d F Y', strtotime($a->tgl_lahir)); ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td><?= $a->email; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-3 mt-3 ml-2">
                            <a href="<?= base_url() . 'user/profile_update' ?>" class="btn btn-primary">Edit Profile</a>
                        </div>
                    <?php } ?>
                </div>

            </div>
            <!-- end -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->