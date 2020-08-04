<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Petugas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas' ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Tambah Petugas</li>
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
                    <h4>Tambah Petugas</h4>
                </div>
                <div class="card-body">

                    <form method="post" action="<?php echo base_url() . 'admin/petugas_tambah'; ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="id_login" name="id_login" value="ID<?php echo sprintf("%04s", $id_login) ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="nis" name="nip" placeholder="Nomer Induk Pegawai" value="<?= set_value('nip'); ?>">
                            <?= form_error('nip', '<small class="text-danger pl-3">', '</small>');  ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>');  ?>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group col-sm-6 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">+62</span>
                                </div>
                                <input type="number" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="No Hp." required>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="custom-select" name="jenkel">
                                        <option selected>Jenis Kelamin</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </form>
                </div>
            </div>




            <!-- end -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->