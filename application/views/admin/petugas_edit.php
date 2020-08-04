<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Petugas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/petugas' ?>">Petugas</a></li>
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
                    <?php foreach ($petugas as $a) { ?>
                        <form method="post" action="<?php echo base_url() . 'admin/petugas_edit_aksi'; ?>">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">NIP</span>
                                </div>
                                <input type="number" class="form-control" name="nip" placeholder="Nomor Induk" required="required" value="<?php echo $a->nip; ?>">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Nama</span>
                                </div>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required="required" value="<?php echo $a->nama; ?>">
                            </div>
                            <div class="row">
                                <div class="input-group col-sm-6 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">+62</span>
                                    </div>
                                    <input type="number" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="No Hp." required value="<?= $a->no_hp ?>">
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="custom-select" name="jenkel">
                                            <option selected value="<?= $a->jenkel; ?>">
                                                <?php if ($a->jenkel == 'L') {
                                                    echo "Laki-laki";
                                                } else if ($a->jenkel == 'P') {
                                                    echo "Perempuan";
                                                } {
                                                    echo "-";
                                                }
                                                ?></option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
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