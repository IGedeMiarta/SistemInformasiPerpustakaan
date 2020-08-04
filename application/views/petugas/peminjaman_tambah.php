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
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas' ?>">Home</a></li>
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
            <!-- start -->
            <div class="card">

                <div class="card-body">


                    <?php
                    $id_detail = "0";
                    ?>

                    <form method="post" action="<?php echo base_url() . 'petugas/peminjaman_aksi'; ?>">
                        <div class="form-group">
                            <label class="font-weight-bold" for="anggota">Anggota</label>
                            <div class="input-group mb-3">
                                <input id="id_anggota" name="anggota" type="text" class="form-control" placeholder="nama anggota" aria-label="Judul Buku" aria-describedby="basic-addon2" required="required">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target=".modalBesar"><i class="fa fa-search"></i> Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="buku">Buku</label>
                            <div class="input-group mb-3">
                                <input id="id_detail2" name="id_detail" type="text" class="form-control" placeholder="Cari Buku" aria-label="Judul Buku" aria-describedby="basic-addon2" required="required">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target=".modal_buku"><i class="fa fa-search"></i> Cari</button>
                                </div>
                            </div>
                        </div>

                        <br>

                        <input type="submit" class="btn btn-success pull-right" value="Tambah">
                        <br /><br />

                    </form>
                </div>
            </div>
        </div>


        <!-- end -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->