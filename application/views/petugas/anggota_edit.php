<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Anggota</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas/anggota' ?>">Anggota</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                <div class="card-header text-center">
                    <h4>Edit Anggota</h4>
                </div>
                <div class="card-body">
                    <?php foreach ($anggota as $a) { ?>
                        <form method="post" action="<?php echo base_url() . 'petugas/anggota_update'; ?>">

                            <div class="form-group">
                                <label class="font-weight-bold" for="nip">NIS</label>
                                <input type="number" class="form-control" name="nis" placeholder="Masukkan NIS" required="required" value="<?php echo $a->nis; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="nama">Nama Lengkap</label>
                                <input type="hidden" value="<?php echo $a->nis; ?>" name="id">
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" required="required" value="<?php echo $a->nama; ?>">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="font-weight-bold" for="kelas">Kelas</label>
                                    <select class="custom-select" name="kelas" required="required">
                                        <option selected><?php echo $a->kelas; ?></option>
                                        <option value="VII A">VII A</option>
                                        <option value="VII B">VII B</option>
                                        <option value="VII C">VII C</option>
                                        <option value="VII D">VII D</option>
                                        <option value="VII E">VII E</option>
                                        <option value="VII F">VII F</option>
                                        <option value="VII G">VII G</option>

                                        <option value="VIII A">VIII A</option>
                                        <option value="VIII B">VIII B</option>
                                        <option value="VIII C">VIII C</option>
                                        <option value="VIII D">VIII D</option>
                                        <option value="VIII E">VIII E</option>
                                        <option value="VIII F">VIII F</option>
                                        <option value="VIII G">VIII G</option>

                                        <option value="XI A">IX A</option>
                                        <option value="XI B">IX B</option>
                                        <option value="XI C">IX C</option>
                                        <option value="XI D">IX D</option>
                                        <option value="XI E">IX E</option>
                                        <option value="XI F">IX F</option>
                                        <option value="XI G">IX G</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="font-weight-bold" for="jenkel">Jenis Kelamin</label>
                                    <select class="custom-select" name="jenkel">
                                        <option selected value="<?php echo $a->jenkel; ?>">
                                            <?php if ($a->jenkel == 'L') {
                                                echo "Laki-laki";
                                            } else if ($a->jenkel == 'P') {
                                                # code...
                                            } else {
                                                echo "-";
                                            }  ?>
                                        </option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" required="required" placeholder="Masukkan alamat"><?php echo $a->alamat; ?></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="font-weight-bold" for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" placeholder="<?php echo $a->tempat_lahir; ?>" value="<?php echo $a->tempat_lahir; ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label class="font-weight-bold" for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" placeholder="<?php echo $a->tgl_lahir; ?>" value="<?php echo $a->tgl_lahir; ?>">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </form>
                    <?php } ?>

                </div>
            </div>




            <!-- end -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->