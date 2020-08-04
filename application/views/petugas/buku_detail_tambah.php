<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Detail Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas/buku' ?>">Buku</a></li>
                        <li class="breadcrumb-item active">Tambah Detail Buku</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
    foreach ($detail as $d) {
        $id_buku = $d->id_buku;
        $id_detail = $d->id_detail;
        $judul = $d->judul;
    }
    ?>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- start -->
            <div class="card">
                <div class="card-header text-center">
                    <h4>Tambah Detail Buku</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url() . 'petugas/buku_detail_aksi'; ?>">
                        <div class="form-group">
                            <!-- <label for="cari">Kode Buku</label> -->
                            <input type="hidden" class="form-control" id="id_buku" name="id_buku" value="<?php echo $id_buku; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <!-- <label for="cari">Kode Detail Buku</label> -->
                            <input type="hidden" class="form-control" id="id_detail" name="id_detail" value="<?php echo $id_detail; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="judul">Judul Buku</label>
                            <input type="text" class="form-control" name="judul" value="<?php echo $judul; ?>" required="required" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="tanggal_mulai">Tanggal Buku Masuk</label>
                            <input type="date" class="form-control" name="tgl_masuk" placeholder="Masukkan tanggal buku masuk" required="required">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="ket">Keterangan</label>
                            <textarea class="form-control" name="ket" required="required" placeholder="Keterangan buku"></textarea>
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