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
                        <li class="breadcrumb-item active">dashboard</li>

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
            <div class="jumbotron text-center">
                <div class="col-sm-8 mx-auto">
                    <h1>Selamat datang!</h1>
                    <p>Halaman Admin perpustakaan, Petugas dapat menambah petugas perpustakaan dengan menginputkan data petugas, dan mengontrol seluruh aktifitas sistem</b>.</p>
                    <p>
                        Anda telah login sebagai <b><?php echo "Administrator" ?></b>
                    </p>

                </div>
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <?php foreach ($petugas as $a) {

                    ?>
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?= $a->jumlah; ?></h3>

                                <p>Jumlah Petugas</p>
                            </div>

                        <?php } ?>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="<?= base_url() . 'admin/petugas' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <?php foreach ($buku as $a) {

                    ?>

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= $a->jumlah; ?></h3>
                                <p>Jumlah Buku</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-book"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    <?php } ?>
                </div>
                <!-- ./col -->


                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php foreach ($peminjaman as $a) {

                            ?>
                                <h3><?= $a->jumlah; ?></h3>
                            <?php } ?>
                            <p>Jumlah Pinjaman</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php foreach ($pemesanan as $a) {

                            ?>
                                <h3><?= $a->jumlah; ?></h3>
                            <?php } ?>

                            <p>Total Pemesanan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-business-time"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->





            <!-- end -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->