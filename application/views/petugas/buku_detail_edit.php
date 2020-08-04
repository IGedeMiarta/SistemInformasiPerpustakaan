<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Detail Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php foreach ($detail as $d) { ?>
                            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas' ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas/buku' ?>">Buku</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas/buku_detail/' . $d->id_buku; ?>">Buku Detail</a></li>
                            <li class="breadcrumb-item active">Edit Buku Detail</li>
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
                    <a href="<?php echo base_url() . 'petugas/anggota' ?>" class='btn btn-sm btn-light btn-outline-dark  pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
                    <br />
                    <br />


                    <form method="post" action="<?php echo base_url() . 'petugas/buku_detail_update'; ?>">
                        <div class="form-group">
                            <label class="font-weight-bold" for="nik">Id Detail</label>
                            <input type="text" class="form-control" name="id_detail" placeholder="id detail buku" required="required" value="<?php echo $d->id_detail; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="id_buku">Kode Buku</label>
                            <input type="text" class="form-control" name="id_buku" placeholder="id_buku" required="required" value="<?php echo $d->id_buku; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="id_buku">Judul Buku</label>
                            <input type="text" class="form-control" name="judul" placeholder="id_buku" value="<?php echo $d->judul; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="tgl_masuk">Tanggal Buku Masuk</label>
                            <input type="date" class="form-control" name="tgl_masuk" placeholder="Masukkan tanggal buku masuk" value="<?php echo $d->tgl_masuk; ?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="alamat">Keterangan</label>
                            <textarea class="form-control" name="ket" placeholder="Masukkan keterangan"><?php echo $d->ket; ?></textarea>
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