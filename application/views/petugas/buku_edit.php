<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas/buku' ?>">Buku</a></li>
                        <li class="breadcrumb-item active">Edit Buku</li>
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
                    <?php foreach ($buku as $b) { ?>
                        <form method="post" action="<?php echo base_url() . 'petugas/buku_update'; ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="font-weight-bold" for="judul">Kode Buku</label>
                                <input type="hidden" name="id_buku" value="<?php echo $b->id_buku; ?>">
                                <input type="text" class="form-control" name="judul" placeholder="Masukkan judul buku" required="required" value="<?php echo $b->id_buku; ?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="judul">Judul Buku</label>
                                <input type="hidden" name="judul" value="<?php echo $b->judul; ?>">
                                <input type="text" class="form-control" name="judul" placeholder="Masukkan judul buku" required="required" value="<?php echo $b->judul; ?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="tahun">Tahun Terbit</label>
                                <select class="form-control" name="tahun" required="required">
                                    <option value="">- Pilih tahun</option>
                                    <?php for ($tahun = date('Y'); $tahun >= 1990; $tahun--) { ?>
                                        <option <?php if ($tahun == $b->tahun) {
                                                    echo "selected='selected'";
                                                } ?> value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="penulis">Penulis Buku</label>
                                <input type="text" class="form-control" name="penulis" placeholder="Masukkan nama penulis" required="required" value="<?php echo $b->penulis; ?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="penulis">Penerbit Buku</label>
                                <input type="text" class="form-control" name="penerbit" placeholder="Masukkan nama penerbit" required="required" value="<?php echo $b->penerbit; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="gambar_edt" value="<?php echo $b->gambar; ?>" hidden>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="tgl_lahir">Upload Gambar</label>
                                <input type="file" class="form-control form-control-user" id="gambar" name="gambar">
                            </div>
                            <input type="submit" class="btn btn-primary center-block" value="Simpan">
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